#! /usr/bin/python
import cv
import sys
 
if __name__ == '__main__':
    # Declare the IplImage
    pImg = None;
    pContourImg = None;
 
    storage = cv.CreateMemStorage(0);
    contour = None;
    mode = cv.CV_RETR_EXTERNAL;    
 
    # Create Windows
 
    cv.NamedWindow("src", 1)
    cv.NamedWindow("contour",1)
 
    # Load Image, Convert to Gray by force
 
    pImg = cv.LoadImage("image.jpg", 0) # A image in the same directory of the file.
 
    cv.ShowImage( "src", pImg );
 
    # Apply the Memory Storage for Contour Image.        
 
    pContourImg = cv.CreateImage(cv.GetSize(pImg),cv.IPL_DEPTH_8U,3);
 
    # copy source image and convert it to BGR image
 
    cv.CvtColor(pImg, pContourImg, cv.CV_GRAY2BGR);
 
    # Find contours
 
    contour = cv.FindContours( pImg, storage, cv.CV_RETR_CCOMP,
        cv.CV_CHAIN_APPROX_SIMPLE); 
 
    # Draw the Contours
 
    cv.DrawContours(pContourImg, contour, cv.CV_RGB(255,0,0), cv.CV_RGB(0, 0, 255),
        2, 2, 8);
 
    # Show Image
 
    cv.ShowImage( "contour", pContourImg );
    cv.WaitKey(0);
 
    # Destory Windows
 
    cv.DestroyWindow( "src" );
    cv.DestroyWindow( "contour" );
 
    # Python2.7-OpenCV2.2 will Release Image MemStorage Automatically
 
    #cv.ReleaseImage( pImg );
    #cv.ReleaseImage( pContourImg );
 
    #cv.ReleaseMemStorage(storage);
 
    sys.exit(0)
