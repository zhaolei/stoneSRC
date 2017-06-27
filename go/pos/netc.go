package main
import "fmt"
import "net"

func main() {
    conn, err := net.Dial("tcp", "127.0.0.1:9080")
    fmt.Printf("Received message %s -> %s \n", conn.RemoteAddr(), conn.LocalAddr())
    if err != nil {
        // handle error
        fmt.Println("tcp error")
    }
    conn.Write([]byte("stonepwd"))
    conn.Close()
}

