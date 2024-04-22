<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Order</title>
    <style>
        .box{
            margin: 30px;
        }
    </style>
</head>

<body>
    <div class="box">
    
    <!-- HEADER -->
    <p><h2>Input your order</h2></p>

    <!-- FORM dikirim ke halaman result.php dengan metode POST -->
    <form method="POST" action="result.php">
        <b>Menu</b><br>

        <!-- SELECT OPTION menu -->
        <!-- NAME = nama variabel, VALUE = nilai yang diisikan -->
        <select name="menu" style="width:510px; height:30px;"> 
            <option value="menu">Menu</option> <!-- ini option tambahan agar lebih rapi, tapi jangan lupa di result.php dibuat eror handlingnya jika terpilih, karena dia tidak termasuk menu kopi --> 
            <option value="Americano">Americano</option>
            <option value="Mochaccino">Mochaccino</option>
            <option value="Hazelnut Latte">Hazelnut Latte</option>
            <option value="Vanilla Latte">Vanilla Latte</option>
            <option value="Salted Caramel">Salted Caramel</option>
        </select>
        <br><br>

        <!-- RADIOBUTTON hot/ice -->
        <b>Hot/Ice</b><br>
        <input type="radio" value="Hot" name="type">Hot
        <input type="radio" value="Ice" name="type" checked>Ice <!-- CHECKED untuk menyetel default pada tipe RADIOBUTTON ataupun CHECKBOX-->
        <br><br>

        <!-- RADIOBUTTON size -->
        <b>Size</b><br>
        <input type="radio" value="Regular" name="size" checked>Regular
        <input type="radio" value="Large" name="size">Large
        <br><br>

        <!-- RADIOBUTTON sweetness level -->
        <b>Sweetness Level</b><br>
        <input type="radio" value="Normal" name="sweet" checked>Normal Sweet
        <input type="radio" value="Less" name="sweet">Less Sweet
        <br><br>

        <!-- RADIOBUTTON dairy -->
        <b>Dairy</b> <span style="color:grey; font-size:12px;">optional</span><br>
        <input type="radio" value="Milk" name="dairy">Milk
        <input type="radio" value="Oat Milk" name="dairy">Oat Milk
        <input type="radio" value="Almond Milk" name="dairy">Almond Milk
        <br><br>

        <!-- CHECKBOX topping -->
        <!-- NAME jenisnya ARRAY karena dia menggunakan input type CHECKBOX yang dapat memilih lebih dari satu,
        berbeda dengan input type RADIOBUTTON yang hanya dapat memilih satu saja -->
        <b>Topping</b> <span style="color:grey; font-size:12px;">optional</span><br>
        <input type="checkbox" value="Caramel Sauce" name="topping[]">Caramel Sauce<br>
        <input type="checkbox" value="Caramel Crumble" name="topping[]">Caramel Crumble<br>
        <input type="checkbox" value="Choco Granola" name="topping[]">Choco Granola<br>
        <input type="checkbox" value="Sea Salt Cream" name="topping[]">Sea Salt Cream<br>
        <br>

        <!-- TEXTAREA note -->
        <b>Note</b><br>
        <textarea name="note" rows="5" cols="20" style="width:500px; height:80px;" placeholder="Write your additional note here"></textarea><br>
        <!-- PLACEHOLDER untuk menyetel tulisan default. Jika tidak diubah/diisi user saat submit form, maka tidak akan mengirimkan apapun (kosong, bukan mengirimkan tulisan defaultnya ya)
        berbeda jika menyetel tulisan default dengan VALUE. Jika disubmit tanpa diubah maka akan terkirim tulisan defaultnya-->
        <br>

        <!-- SUBMIT dan RESET -->
        <input type="submit" value="submit">
        <input type="reset" value="reset"> 
    </form>

    </div>

</body>
</html>