#! /usr/bin/python
from numpy import *
import matplotlib
import matplotlib.pyplot as plt
from matplotlib.patches import Rectangle
import logRegresX

dataMat,labelMat=logRegresX.loadDataSet()
print dataMat
dataMatrix = mat(dataMat).transpose()            #convert to NumPy matrix
labelMati = mat(labelMat).transpose() #convert to NumPy matrix

print labelMati
print dataMatrix
#print dataMatrix.transpose()

#weights = logRegresX.stocGradAscent1(dataArr,labelMat)

#n = shape(dataArr)[0] #number of points to create
#m = shape(dataArr) #number of points to create

#print dataArr
#logRegresX.plotBestFit(weights)
#print m
exit()
