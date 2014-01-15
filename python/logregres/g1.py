'''
Created on Oct 27, 2010
Logistic Regression Working Module
@author: Peter
'''
from numpy import *
import matplotlib.pyplot as plt

def loadDataSet():
    dataMat = []; labelMat = []
    x = []; y = []
    fr = open('d')
    for line in fr.readlines():
        lineArr = line.strip().split()
        dataMat.append([1, int(lineArr[0])])
        labelMat.append(int(lineArr[1]))
        x.append(int(lineArr[0]))
        y.append(int(lineArr[1]))
    return x,y,dataMat,labelMat

def gradAscent(dataMatIn, classLabels):
    dataMatrix = mat(dataMatIn)             #convert to NumPy matrix
    labelMat = mat(classLabels).transpose() #convert to NumPy matrix
    m,n = shape(dataMatrix)
    alpha = 0.000001
    maxCycles = 200
    weights = ones((n,1))
    for k in range(maxCycles):              #heavy on matrix operations
        h = dataMatrix*weights     #matrix mult
        error = (labelMat - h)              #vector subtraction
        weights = weights + alpha * dataMatrix.transpose()* error #matrix mult
    return weights


a1,a2, d1, l1  = loadDataSet()

#print d1
#print l1
d2 = array(d1)

f1 = gradAscent(d2,l1)

print f1
th0 =  float(f1[0][0])
th1 =  float(f1[1][0])


a3 = mat(a1)
a4 = a3.transpose()


fig = plt.figure()
ax = fig.add_subplot(111)

#x1 = ([2.1,1.1,3.5,6.4])
#y1 = ([2.3,1.6,3.7,6.9])
ax.scatter(a1, a2, s=20, c='red')
#ax.scatter(x1, y1, s=5, c='red')
#ax.scatter(xcord2, ycord2, s=30, c='green')
x = arange(1.0,20.0, 0.1)
#y = (-weights[0]-weights[1]*x)/weights[2]
#y = (-f1[0]-f1[1]*x)/f1[2]
y = th0 + th1*x
#y = x * 2 + 5
#y = x * x * x * x * x 
#y = sin(x) * cos(x)
print x 
print y 
ax.plot(x, y)

#ax.plot(a1, a2)
#plt.xlabel('X1'); plt.ylabel('X2');
plt.show()
