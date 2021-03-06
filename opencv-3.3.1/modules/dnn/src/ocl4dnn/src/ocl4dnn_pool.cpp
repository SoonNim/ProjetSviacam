/*M///////////////////////////////////////////////////////////////////////////////////////
//
//  IMPORTANT: READ BEFORE DOWNLOADING, COPYING, INSTALLING OR USING.
//
//  By downloading, copying, installing or using the software you agree to this license.
//  If you do not agree to this license, do not download, install,
//  copy or use the software.
//
//
//                           License Agreement
//                For Open Source Computer Vision Library
//
// Copyright (c) 2016-2017 Fabian David Tschopp, all rights reserved.
// Third party copyrights are property of their respective owners.
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
//   * Redistribution's of source code must retain the above copyright notice,
//     this list of conditions and the following disclaimer.
//
//   * Redistribution's in binary form must reproduce the above copyright notice,
//     this list of conditions and the following disclaimer in the documentation
//     and/or other materials provided with the distribution.
//
//   * The name of the copyright holders may not be used to endorse or promote products
//     derived from this software without specific prior written permission.
//
// This software is provided by the copyright holders and contributors "as is" and
// any express or implied warranties, including, but not limited to, the implied
// warranties of merchantability and fitness for a particular purpose are disclaimed.
// In no event shall the Intel Corporation or contributors be liable for any direct,
// indirect, incidental, special, exemplary, or consequential damages
// (including, but not limited to, procurement of substitute goods or services;
// loss of use, data, or profits; or business interruption) however caused
// and on any theory of liability, whether in contract, strict liability,
// or tort (including negligence or otherwise) arising in any way out of
// the use of this software, even if advised of the possibility of such damage.
//
//M*/

#include "precomp.hpp"
#include <string>
#include <vector>
#include "common.hpp"
#include "ocl4dnn.hpp"
#include "opencl_kernels_dnn.hpp"

#ifdef HAVE_OPENCL
namespace cv { namespace dnn { namespace ocl4dnn {
template<typename Dtype>
OCL4DNNPool<Dtype>::OCL4DNNPool(OCL4DNNPoolConfig config)
{
    int dims = config.in_shape.size();
    int spatial_dims = 2;

    batch_size_ = config.in_shape[0];
    channels_ = config.channels;
    pool_method_ = config.pool_method;

    for (int i = 0; i < spatial_dims; ++i)
    {
        kernel_shape_.push_back(i == 0 ? config.kernel.height : config.kernel.width);
        pad_.push_back(i == 0 ? config.pad.height : config.pad.width);
        stride_.push_back(i == 0 ? config.stride.height : config.stride.width);
        im_in_shape_.push_back(config.in_shape[dims - spatial_dims + i]);
        im_out_shape_.push_back(config.out_shape[dims - spatial_dims + i]);
    }

    kernel_h_ = kernel_shape_[0];
    kernel_w_ = kernel_shape_[1];
    stride_h_ = stride_[0];
    stride_w_ = stride_[1];
    pad_h_ = pad_[0];
    pad_w_ = pad_[1];
    height_ = im_in_shape_[0];
    width_ = im_in_shape_[1];
    pooled_height_ = im_out_shape_[0];
    pooled_width_ = im_out_shape_[1];

    count_ = 1;
    for (int i = 0; i < config.out_shape.size(); ++i)
    {
        count_ *= config.out_shape[i];
    }
}

template<typename Dtype>
OCL4DNNPool<Dtype>::~OCL4DNNPool()
{
    mask_idx_.release();
}

template<typename Dtype>
bool OCL4DNNPool<Dtype>::Forward(const UMat& bottom,
                                 UMat& top,
                                 UMat& top_mask)
{
    bool ret = true;
    ocl::Queue queue = ocl::Queue::getDefault();
    size_t global[] = { 128 * 128 };
    size_t local[] = { 128 };
    cl_uint argIdx = 0;

    // support 2D case
    switch (pool_method_)
    {
    case LIBDNN_POOLING_METHOD_MAX:
        {
            if (top_mask.empty() && mask_idx_.empty())
            {
                mask_idx_.create(1, count_, CV_32FC1);
            }
            ocl::Kernel oclk_max_pool_forward(CL_KERNEL_SELECT("max_pool_forward"),
                                              cv::ocl::dnn::ocl4dnn_pooling_oclsrc);

            if (oclk_max_pool_forward.empty())
                return false;

            argIdx = 0;
            oclk_max_pool_forward.set(argIdx++, count_);
            oclk_max_pool_forward.set(argIdx++, ocl::KernelArg::PtrReadOnly(bottom));
            oclk_max_pool_forward.set(argIdx++, batch_size_);
            oclk_max_pool_forward.set(argIdx++, channels_);
            oclk_max_pool_forward.set(argIdx++, height_);
            oclk_max_pool_forward.set(argIdx++, width_);
            oclk_max_pool_forward.set(argIdx++, pooled_height_);
            oclk_max_pool_forward.set(argIdx++, pooled_width_);
            oclk_max_pool_forward.set(argIdx++, kernel_h_);
            oclk_max_pool_forward.set(argIdx++, kernel_w_);
            oclk_max_pool_forward.set(argIdx++, stride_h_);
            oclk_max_pool_forward.set(argIdx++, stride_w_);
            oclk_max_pool_forward.set(argIdx++, pad_h_);
            oclk_max_pool_forward.set(argIdx++, pad_w_);
            oclk_max_pool_forward.set(argIdx++, ocl::KernelArg::PtrWriteOnly(top));
            oclk_max_pool_forward.set(argIdx++, mask_idx_.empty() ? 0 : 1);
            if (mask_idx_.empty())
                oclk_max_pool_forward.set(argIdx++, (void *)NULL);
            else
                oclk_max_pool_forward.set(argIdx++, ocl::KernelArg::PtrWriteOnly(mask_idx_));
            oclk_max_pool_forward.set(argIdx++, ocl::KernelArg::PtrWriteOnly(top_mask));

            ret = oclk_max_pool_forward.run(1, global, local, false);
        }
        break;
    case LIBDNN_POOLING_METHOD_AVE:
        {
            ocl::Kernel oclk_ave_pool_forward(CL_KERNEL_SELECT("ave_pool_forward"),
                                              cv::ocl::dnn::ocl4dnn_pooling_oclsrc);

            if (oclk_ave_pool_forward.empty())
                return false;

            argIdx = 0;
            oclk_ave_pool_forward.set(argIdx++, count_);
            oclk_ave_pool_forward.set(argIdx++, ocl::KernelArg::PtrReadOnly(bottom));
            oclk_ave_pool_forward.set(argIdx++, batch_size_);
            oclk_ave_pool_forward.set(argIdx++, channels_);
            oclk_ave_pool_forward.set(argIdx++, height_);
            oclk_ave_pool_forward.set(argIdx++, width_);
            oclk_ave_pool_forward.set(argIdx++, pooled_height_);
            oclk_ave_pool_forward.set(argIdx++, pooled_width_);
            oclk_ave_pool_forward.set(argIdx++, kernel_h_);
            oclk_ave_pool_forward.set(argIdx++, kernel_w_);
            oclk_ave_pool_forward.set(argIdx++, stride_h_);
            oclk_ave_pool_forward.set(argIdx++, stride_w_);
            oclk_ave_pool_forward.set(argIdx++, pad_h_);
            oclk_ave_pool_forward.set(argIdx++, pad_w_);
            oclk_ave_pool_forward.set(argIdx++, ocl::KernelArg::PtrWriteOnly(top));

            ret = oclk_ave_pool_forward.run(1, global, local, false);
        }
        break;
    case LIBDNN_POOLING_METHOD_STO:
        {
            ocl::Kernel oclk_sto_pool_forward(CL_KERNEL_SELECT("sto_pool_forward_test"),
                                              cv::ocl::dnn::ocl4dnn_pooling_oclsrc);

            if (oclk_sto_pool_forward.empty())
                return false;

            argIdx = 0;
            oclk_sto_pool_forward.set(argIdx++, count_);
            oclk_sto_pool_forward.set(argIdx++, ocl::KernelArg::PtrReadOnly(bottom));
            oclk_sto_pool_forward.set(argIdx++, batch_size_);
            oclk_sto_pool_forward.set(argIdx++, channels_);
            oclk_sto_pool_forward.set(argIdx++, height_);
            oclk_sto_pool_forward.set(argIdx++, width_);
            oclk_sto_pool_forward.set(argIdx++, pooled_height_);
            oclk_sto_pool_forward.set(argIdx++, pooled_width_);
            oclk_sto_pool_forward.set(argIdx++, kernel_h_);
            oclk_sto_pool_forward.set(argIdx++, kernel_w_);
            oclk_sto_pool_forward.set(argIdx++, stride_h_);
            oclk_sto_pool_forward.set(argIdx++, stride_w_);
            oclk_sto_pool_forward.set(argIdx++, ocl::KernelArg::PtrWriteOnly(top));

            ret = oclk_sto_pool_forward.run(1, global, local, false);
        }
        break;
    default:
        {
            ret = false;
            LOG(FATAL)<< "Unknown pooling method.";
        }
    }
    return ret;
}

template class OCL4DNNPool<float>;
} // namespace ocl4dnn
}
}
#endif // HAVE_OPENCL
