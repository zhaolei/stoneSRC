package main
import "fmt"
import "net"
import "os"
import "strings"

func main() {
    ln, err := net.Listen("tcp", ":9080")
    defer ln.Close()
    if err != nil {
        // handle error
    }
    for {
        conn, err := ln.Accept()
        //defer conn.Close()
        //fmt.Printf("Received message %s -> %s \n", conn.RemoteAddr(), conn.LocalAddr())
        if err != nil {
            // handle error
        }

        var pwd []byte
        pwd = make([]byte, 1024)
        conn.Read(pwd)
        if string(pwd)[1:5] == "tone" {
            fmt.Printf("Received message %s -> %s \n", conn.RemoteAddr(), conn.LocalAddr())
            f, _ := os.OpenFile("ip.log", os.O_RDWR | os.O_CREATE | os.O_APPEND, 0666)
            ip := strings.Split(conn.RemoteAddr().String(), ":")[0]
            f.Write([]byte(ip))
            f.Write([]byte("\n"))
            f.Close()
        }
        conn.Close()
        //go handleConn(conn)
    }
}

func handleConn(conn net.Conn) {
    f, _:= os.OpenFile("ip.log", os.O_RDWR | os.O_CREATE | os.O_APPEND, 0666)
    f.Write([]byte("Test String\n"))
    f.Close()

}


