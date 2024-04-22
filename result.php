<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .box{
            margin: 70px;
        }

        a{
            color: white;
        }
    </style>
</head>

<body>
    <div class="box">
    <center><h2>Here's your order</h2>

    <?php
    $price1=0; //harga default
    $price2=0; //harga size
    $price3=0; //harga dairy
    $price4=0; //harga topping

    //HARGA DEFAULT dan PAJAK
    if($_POST['menu']=="Americano") //jika 'menu' yang dipilih VALUEnya "Americano", maka harga default(price1)=12000 dan pajak(tax)=10. Isikan sesuai tabel pada soal ya
    {
        $price1=12000;
        $tax=10; //kenapa pajak di sini tidak pakai persen? karena sudah termasuk ke rumus perhitungan di bawah, scroll aja ya
    }
    else if($_POST['menu']=="Mochaccino")  //jika 'menu' yang dipilih VALUEnya "Mochaccino", maka harga default=15000 dan pajak=10
    {
        $price1=15000;
        $tax=10;
    }
    else if($_POST['menu']=="Hazelnut Latte")  //jika 'menu' yang dipilih VALUEnya "Hazelnut Latte", maka harga default=20000 dan pajak=15
    {
        $price1=20000;
        $tax=15;
    }
    else if($_POST['menu']=="Vanilla Latte") //jika 'menu' yang dipilih VALUEnya "Vanilla Latte", maka harga default=17000 dan pajak=15
    {
        $price1=17000;
        $tax=15;
    }
    else if($_POST['menu']=="Salted Caramel") //jika 'menu' yang dipilih VALUEnya "Vanilla Latte", maka harga default=18000 dan pajak=15
    {
        $price1=18000;
        $tax=15;
    }else { //error handling
        $_POST['menu']="Undefined"; //menyimpan string "Undefined" ke 'menu'
        $tax=0;
    }

    //HARGA SIZE
    if($_POST['size']=="Large")
    {
        $price2=5000; //jika 'size' yang dipilih VALUEnya "Large", maka harga size=5000
    }

    //HARGA DAIRY
    if(isset($_POST['dairy'])) //pakai ISSET untuk mengecek apakah user memilih menggunakan dairy atau tidak karena sifatnya opsional
    {
        if($_POST['dairy']=="Milk") //jika 'dairy' yang dipilih VALUEnya "Milk", maka harga dairy=5000
        {
            $price3=5000;
        }
        else if($_POST['dairy']=="Oat Milk") //jika 'dairy' yang dipilih VALUEnya "Oat Milk", maka harga dairy=6000
        {
            $price3=6000;
        }
        else if($_POST['dairy']=="Almond Milk") //jika 'dairy' yang dipilih VALUEnya "Almond Milk", maka harga dairy=7000
        {
            $price3=7000;
        }
    } else { //error handling jika user tidak memilih menggunakan dairy
        $_POST['dairy']="-";  //menyimpan string "-" ke 'dairy'
    }
    
    //HARGA TOPPING
    if (isset($_POST['topping'])) //pakai ISSET untuk mengecek apakah user memilih menggunakan topping atau tidak karena sifatnya opsional
    {
        foreach ($_POST['topping'] as $topping) //FOREACH AS dipake buat perulangan tipe array ya, jadi tiap isi array topping[] dijadikan variabel $topping dahulu, lalu dicek termasuk jenis topping yang mana
        {
            if($topping=="Caramel Sauce") //jika 'topping' yang dipilih VALUEnya "Caramel Sauce", maka harga topping +3000
            {
                $price4=$price4+3000; //rumusnya kayak gini agar price4 bisa dijumlah berkali-kali sesuai dengan banyak topping yang dipilih
            } else if($topping=="Caramel Crumble") //jika 'topping' yang dipilih VALUEnya "Caramel Crumble", maka harga topping +3000
            {
                $price4=$price4+3000;
            } else if($topping=="Choco Granola") //jika 'topping' yang dipilih VALUEnya "Choco Granola", maka harga topping +4000
            {
                $price4=$price4+4000;
            } else if($topping=="Sea Salt Cream") //jika 'topping' yang dipilih VALUEnya "Sea Salt Cream", maka harga topping +5000
            {
                $price4=$price4+5000;
            }
        }
        //kalau masih bingung alurnya gini, misal user milih 2 topping: "Caramel Sauce" dan "Choco Granola"
        //perulangan ke-1: topping[0]="Caramel Sauce" dijadikan sebagai $topping, dicek kondisi IF ELSE maka didapat $price4 = 0+3000 = 3000
        //perulangan ke-2: topping[1]="Choco Granola" menggantikan sebagai $topping, dicek kondisi IF ELSE maka didapat $price4 = 3000+4000 = 7000
        //sehingga didapat harga topping=7000

    }

    $hargatotal=$price1+$price2+$price3+$price4; //harga total sebelum kena pajak
    $taxes=$hargatotal*($tax/100); //nah ini tax/100 itu artinya tax dalam persen(%), jadi harga pajak didapat dari persenan pajak dikalikan harga total sebelum kena pajak
    $hargatotal=$hargatotal+$taxes; //harga total didapat dari harga total sebelumnya + harga pajak
    ?>

    <!-- OUTPUT ini menggunakan tabel striped yang sudah disediakan bootstrap -->
    <table class="table table-striped">
        <tr> 
            <td color><b>Menu</b></td>
            <td><?= $_POST['menu'] ?></td> <!-- output 'menu' -->
        </tr>

        <tr> 
            <td color><b>Size</b></td>
            <td><?= $_POST['size'] ?></td> <!-- output 'size' -->
        </tr>

        <tr> 
            <td color><b>Hot/Ice</b></td>
            <td><?= $_POST['type'] ?></td> <!-- output 'type' -->
        </tr>

        <tr>
            <td><b>Sweetness Level</b></td>
            <td><?= $_POST['sweet'] ?></td> <!-- output 'sweet' -->
        </tr>

        <tr>
            <td><b>Dairy</b></td>
            <td><?= $_POST['dairy'] ?></td> <!-- output 'dairy' -->
        </tr>

        <tr>
            <td><b>Topping</b></td>
            <td>
                <?php 
                 if(isset($_POST['topping']))
                 {
                    foreach($_POST['topping'] as $topping)
                    {echo "$topping. ";} //output topping
                 }
                 else { //error handling jika user tidak memilih menggunakan topping
                    echo "-";
                 }
                ?>
            </td>
        </tr>

        <tr>
            <td><b>Tax</b></td>
            <td><?= $tax ?>%</td> <!-- output 'pajak' -->
        </tr>

        <tr>
            <td><b>Note</b></td>
            <td><?= $note ?>%</td> <!-- output 'note' -->
        </tr>

        <tr>
            <td><b>Total Price</b></td>
            <td>
            Default <span style="margin-left:43px;">Rp<?= $price1 ?></span> <br> <!-- output harga default -->
            Size  <span style="margin-left:66px;">Rp<?= $price2 ?></span> <br> <!-- output harga size -->
            Dairy  <span style="margin-left:58px;">Rp<?= $price3 ?></span> <br> <!-- output harga dairy -->
            Topping  <span style="margin-left:37px;">Rp<?= $price4 ?></span> <br> <!-- output harga topping -->
            Tax  <span style="margin-left:73px;">Rp<?= $taxes ?></span> <br> <!-- output harga pajak -->
            <span style="margin-left:100px;"><b>Rp<?= $hargatotal ?></b></span> <!-- output harga total -->
            </td>
        </tr>
        
    </table>
    <br><br>
    <button type="button" class="btn btn-dark"><a href="order.php">Grab another one!</a></button> <!-- tombol dengan link mengarah ke halaman order.php, tombol sudah tersedia di bootstrap -->
    </center>
    </div>

</body>
</html>