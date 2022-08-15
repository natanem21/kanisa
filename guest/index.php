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
            <h1 style="background-color:red"><center>books</center></h1>
            <a href="https://ethiopianorthodox.org/amharic/holybooks/orit/zelidet.pdf">ኦሪት ዘልደት</a></br>
      
            <a href="https://ethiopianorthodox.org/amharic/holybooks/orit/zetseat.pdf" >ኦሪት ዘጸአት</a></br>
          <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/rute.pdf >ኦሪት ዘሩት</a></br>
           <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/zelewaweyan.pdf >ኦሪት ዘሌዋውያን</a></br>
<a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/zehulqe.pdf >ኦሪት ዘኁልቁ</a></br>
         <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/zedagem.pdf >ኦሪት ዘዳግም</a></br>
 <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/joshua.pdf >ኦሪት ዘኢያሱ</a></br>
          <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/mesafent.pdf>ኦሪት ዘመሳፍንት</a></br>
  <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/nebiat/samuel01.pdf>1ኛ መጽሐፈ ሳሙኤል</a></br>
           <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/nebiat/samuel02.pdf>2ኛ መጽሐፈ ሳሙኤል</a></br>
<a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/nebiat/negest01.pdf>1ኛ መጽሐፈ ነገሥት</a></br>
         <a href="https://www.ethiopianorthodox.org/amharic/holybooks/orit/nebiat/negest02.pdf>2ኛ መጽሐፈ ነገሥት</a></br>
                   
            <a href="http://" target="_blank" rel="noopener noreferrer">book 3</a></br>
            <a href="http://" target="_blank" rel="noopener noreferrer">book 4</a></br>


            <button>book</button>
        </div>
    </div>

    <div class="cm">
      
        <!-- reserved for futute use -->
    </div>

</div>
<?php include("footer.php");?>
