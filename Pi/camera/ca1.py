import cv

def getcamera():
    capture = cv.CaptureFromCAM(0)
    img = cv.QueryFrame(capture)
    cv.SaveImage("ca1.jpg", img)

getcamera()
