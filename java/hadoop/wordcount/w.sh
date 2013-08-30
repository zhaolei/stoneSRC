javac -classpath /stone/ser/hadoop-1.2.1/hadoop-core-1.2.1.jar -d wordcount_classes WordCount.java
jar -cvf wordcount.jar -C wordcount_classes/ .
bin/hadoop jar /usr/joe/wordcount.jar org.myorg.WordCount /usr/joe/wordcount/input /usr/joe/wordcount/output

