package app.zhaolei.test;

import java.sql.*;

class SqlB 
{  
        public static void main(String args[])
        {
            int len = args.length;
            int i = 0;
            String driver = "com.mysql.jdbc.Driver";
            // 驱动程序名

            // URL指向要访问的数据库名scutcs
            //String url = "jdbc:mysql://127.0.0.1:8306/stone";
            String url = "jdbc:mysql://127.0.0.1:8306/stone?user=root&password=521aladdin";

            // MySQL配置时的用户名
            String user = "root"; 
                                               
            // MySQL配置时的密码
            String password = "521aladdin";

            try { 
                // 加载驱动程序
                Class.forName(driver);
                // 连续数据库
                //Connection conn = DriverManager.getConnection(url, user, password);
                Connection conn = DriverManager.getConnection(url);

                if(!conn.isClosed()) 
                System.out.println("Succeeded connecting to the Database!");

                // statement用来执行SQL语句
                Statement statement = conn.createStatement();

                // 要执行的SQL语句
                String sql = "select * from namex limit 10";

                // 结果集
                ResultSet rs = statement.executeQuery(sql);

                System.out.println("-----------------");
                String name = null;

                while(rs.next()) {
                
                    // 选择sname这列数据
                    //name = rs.getString("bash");
               
                    // 首先使用ISO-8859-1字符集将name解码为字节序列并将结果存储新的字节数组中。
                    // 然后使用GB2312字符集解码指定的字节数组
                    //name = new String(name.getBytes("ISO-8859-1"),"GB2312");

                    // 输出结果
                    System.out.println(rs.getString("hash"));
                    System.out.println(rs.getLong("hash") + "|" + rs.getShort("year"));
                }
                rs.close();
                conn.close();
        } catch(ClassNotFoundException e){           
            System.out.println("Sorry,can`t find the Driver!"); 
            e.printStackTrace();
        } catch(SQLException e) {
            e.printStackTrace();
        } catch(Exception e) {
            e.printStackTrace();
            
        }
    }
}
