package main
import "fmt"
import "net"

func main() {
    conn, err := net.Dial("tcp", "127.0.0.1:8080")
    fmt.Printf("Received message %s -> %s \n", conn.RemoteAddr(), conn.LocalAddr())
    if err != nil {
        // handle error
        fmt.Println("tcp error")
    }
    var ch []byte
    ch = make([]byte, 1024)
    fmt.Println("connect ok")

    num,err := conn.Write([]byte("Hello server from client \n"))
    fmt.Printf("num: %d\n",num)
    if err != nil {
        // do
        fmt.Println("Write err")
    }

    num01,err01 := conn.Read(ch)
    fmt.Printf("rec[%d]: %s \n",num01, string(ch))
    if err01 != nil {
        //do 
        fmt.Println("Read err")
    }
    conn.Close()
}

