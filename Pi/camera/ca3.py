import cv2
import numpy as np

camera = cv2.VideoCapture(0)

im = camera.read()
im1 = np.array(im)

cv2.imwrite('tt1.jpg', im1)
