package app.zhaolei.test;

class Hello 
{  
        public static void main(String args[])
        {
            int len = args.length;
            int i = 0;

            System.out.println(len);
            for(i = 0; i< len; i++) {
                System.out.println(args[i]);
            }
        }
}
