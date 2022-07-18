<?php $title="home page";
$direct="<a href ='about_this_church.php'> <img src='gg.png' alt='profile image' class='profile'>";
include("header.php");
?>

    <div class="c2">
        <div class="go_right">
            <script>
                if(navigator.onLine)
                    {
                        document.write('<iframe class="responsive-iframe" src="https://www.ethiopicbible.com/readings/today" sandbox="allow-forms allow-scripts"   ></iframe>');
                    }

                    else
                    {
                        document.write('<iframe class="responsive-iframe" src="book_holder.php" sandbox="allow-forms allow-scripts"   ></iframe>');
                    }
            </script>
            
        </div>

        <div class="go_left">
            <h1>books</h1>
            <button>book</button>
        </div>
    </div>

    <div class="cm">
        <h1>this is first</h1>
        <h1>this is first</h1>
        <h1>this is first</h1>
        <h1>this is first</h1>
        <!-- reserved for futute use -->
    </div>

</div>
<?php include("footer.php");?>