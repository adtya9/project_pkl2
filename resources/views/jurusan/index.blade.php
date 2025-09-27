<html>
    <head>
        <script src = "http://cdn.talwindcss.com"></script>
    </head>
    <body>
        <div class = "container mx-auto mt-10">

        <h1 class = "text-4xl mb-6 text-center text-[#e67e22] font-bold">Data Jurusan</h1>

        @if(session('success'))
        <p style = "color: #e67e22;">{{session('success')}}</p>
        @endif

        @if(session('error'))
        <p style = "color:red;">{{session('error')}}</p>
        @endif

        <table border = 
        </div> 
    </body>
</html>