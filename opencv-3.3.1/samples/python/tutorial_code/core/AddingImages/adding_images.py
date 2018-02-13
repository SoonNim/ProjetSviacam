from __future__ import print_function
import sys

import cv2

alpha = 0.5

print(''' Simple Linear Blender
-----------------------
* Enter alpha [0.0-1.0]: ''')
if sys.version_info >= (3, 0): # If Python 3.x
    input_alpha = float(input())
else:
    input_alpha = float(raw_input())
if 0 <= alpha <= 1:
    alpha = input_alpha
## [load]
src1 = cv2.imread('data/LinuxLogo.jpg')
src2 = cv2.imread('data/WindowsLogo.jpg')
## [load]
if src1 is None:
    print ("Error loading src1")
    exit(-1)
elif src2 is None:
    print ("Error loading src2")
    exit(-1)
## [blend_images]
beta = (1.0 - alpha)
dst = cv2.addWeighted(src1, alpha, src2, beta, 0.0)
## [blend_images]
## [display]
cv2.imshow('dst', dst)
cv2.waitKey(0)
## [display]
cv2.destroyAllWindows()
