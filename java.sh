mvn archetype:generate -DarchetypeGroupId=org.apache.maven.archetypes -DgroupId=org.conan.mymahout -DartifactId=myPro -DpackageName=org.conan.mymahout -Dversion=1.0-SNAPSHOT -DinteractiveMode=false
mvn exec:java -Dexec.mainClass="org.zhaolei.Kmeans"
