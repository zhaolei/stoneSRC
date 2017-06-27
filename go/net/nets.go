package main
import "fmt"
import "net"

func main() {
    ln, err := net.Listen("tcp", ":9080")
    defer ln.Close()
    if err != nil {
        // handle error
    }
    for {
        conn, err := ln.Accept()
        defer conn.Close()
        fmt.Printf("Received message %s -> %s \n", conn.RemoteAddr(), conn.LocalAddr())
        if err != nil {
            // handle error
        }
        go handleConn(conn)
    }
}

func handleConn(conn net.Conn) {
    var ch []byte
    ch = make([]byte, 1024)
    fmt.Println("accept ok")

    num,err := conn.Write([]byte("Hello client from server"))
    if err != nil {
        fmt.Printf("num: %d",num)
    }

    num01,err01 := conn.Read(ch)
    fmt.Printf("rec[%d]: %s \n", num01, string(ch))
    if err01 != nil {
    }
    conn.Close()
    fmt.Println("conn close")
}


