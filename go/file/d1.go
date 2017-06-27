package main

import "fmt"
import "os"

func main() {
    var str string
    if len(os.Args) > 1 {
        str = os.Args[1]
    } else {
        str = "aabb"
    }
    f,_ := os.OpenFile("test1", os.O_WRONLY|os.O_CREATE|os.O_TRUNC, 0755)
    f.Write([]byte(str))
    fmt.Println(os.Args)
    f.Close()
}
