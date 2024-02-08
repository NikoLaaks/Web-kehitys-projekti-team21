<!DOCTYPE html>
<html lang="fi">
<head>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tuoreimmat SM-liiga-uutiset ja päivän kiekkokäänteet. Lue viimeisimmät uutisartikkelimme, selvitä pelaajien kuulumiset ja pysy kartalla kiekkomaailman tapahtumista.">
    <title>Uusimpia uutisia liigasta</title>
    <style>
        main{
            display: flex;
            flex-direction: column;
        }
        article{
            position: relative;
            overflow: hidden;
            background-color: #fff;
            border-radius: 8px;
            
            margin: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        img{
            width: 100%;
            height: 300px;
            display: block;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            object-position: 50%;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        a{
            text-decoration: none;
            color: #333;
            display: block;
            position: relative;
        }
        .img-header{
            position: absolute;
            bottom: 0;
            left: 0;
            margin: 0;
            font-size: 1.5vw;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.9);
        }
        .news-item{
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }
        
        .news-item a:hover img{
            opacity: 0.8;
            transition: opacity 0.3s ease-in-out;
        }

        @media (max-width: 720px){
            .news-item{
                flex:1 1 calc(100% - 20px);
                max-width: 100%;
            }
        }
        @media (max-width: 1200px){
            .img-header{
                font-size: 20px;
            }
        }
        footer{
            width: auto;
            display: flex;
            justify-content: center;
         }
         #otsikko{
            display: flex;
            align-items: center;
            justify-content: space-between;
         }
         h3{
            display: block;
            margin-right: 7px;
         }
         h2 a{
            padding: 0;
         }
         h1 a{
            padding: 0;
         }
         footer a{
            padding:0;
         }

    </style>
</head>
<body>
    <header>
        <h1><a href="../index.php">Liiga - Suomen parasta kiekkoa</a></h1>

        <div id="header-links">
        <h2><a href="./uutiset.php">Uutiset</a></h2>
        <h2><a href="./tilastot.html">Tilastot</a></h2>
        <h2><a href="./joukkueet.html">Joukkueet</a></h2>
    </div>
    </header>
    <main>
        <h1 style="text-align: center;text-decoration: underline;font-size: 30px;">Uusimpia uutisia liigasta</h1>
        <article>   
        <?php
            
            //Yhdistetään tietokantaan
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            include("../php/connect.php");
            
            # haetaan uutiset taulusta title, url ja kuvan tiedostonimi
            $tulos=mysqli_query($yhteys, "SELECT title, url, imagename, alt FROM uutiset");
            if($tulos->num_rows > 0) {
                while($row = mysqli_fetch_array($tulos)) {
                    echo "<div class='news-item'>";
                    echo "<a href='https://www.{$row['url']}' target='_blank'>";
                    echo "<img src='{$row['imagename']}' alt='{$row['alt']}'>";
                    echo "<h3 class='img-header'>{$row['title']}</h3>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "Uutisia ei löytynyt";
            }  
        $ok=mysqli_close($yhteys); # suljetaan tietokantayhteys           
        ?>

            <!--   
            <div class="news-item">
                <a href="https://www.iltalehti.fi/smliiga/a/f574a3e6-b72c-4397-a6cb-788183af00fa" target="_blank">
                    <img src="../images/uutiset/Sami_Niku_1.webp" alt="jääkiekkolija sami niku">
                    <h3 class="img-header">JYP hyllytti Sami Nikun – Myös muut tähdet lähdössä?</h3>
                </a>
            </div>
            <div class="news-item">
                   <a href="https://www.is.fi/sm-liiga/art-2000010112727.html" target="_blank">
                       <img src="../images/uutiset/Jyp_Rautakorpi_Nieminen.webp" alt="jukka rautakorpi ja ville nieminen">
                     <h3 class="img-header">Hurjia paljastuksia Jukka Rautakorven potkujen taustalta – tilanne tulehtui, kun mysteerimies Helsingistä astui kuvioihin</h3>
                  </a>
             </div>
             <div class="news-item">
                  <a href="https://www.mtvuutiset.fi/artikkeli/sm-liigassa-hakellyttava-kaanne-tommi-niemela-oli-jo-potku-uhan-alla-nyt-han-palaa-dramaattiseen-kriisikokoukseen/8859644" target="_blank">
                     <img src="../images/uutiset/Tommi_Niemelä.jpg" alt="pelicansin valmentaja tommi niemelä">
                    <h3 class="img-header">SM-liigassa häkellyttävä käänne: Tommi Niemelä oli jo potku-uhan alla – nyt hän palaa dramaattiseen ”kriisikokoukseen”</h3>
                 </a>
            </div>
            <div class="news-item">
                <a href="https://www.jatkoaika.com/Haastattelu/Komarov-kuntoutui-ensimm%C3%A4iseen-HIFKn-liigaotteluunsa-%E2%88%92-T%C3%A4ytyi-katsoa-ett%C3%A4-kest%C3%A4n-pelitilanteet/255028" target="_blank">
                    <img src="../images/uutiset/Leo_Komarov.jpg" alt="hifk:n pelaaja leo komarov">
                    <h3 class="img-header">Komarov kuntoutui ensimmäiseen HIFK:n liigaotteluunsa − "Täytyi katsoa, että kestän pelitilanteet"</h3>
                </a>
            </div>
            <div class="news-item">
                <a href="https://www.iltalehti.fi/smliiga/a/5be6e181-4e51-4f5c-aa0d-4c379c627806" target="_blank">
                    <img src="../images/uutiset/Mikko_Heiskanen.webp" alt="jypin päävalmentaja mikko heiskanen">
                    <h3 class="img-header">Kohuvalmentajalta outo siirto</h3>
                </a>
            </div>
            <div class="news-item">
                <a href="https://www.sportti.com/uutinen.asp?CAT=2-1&ID=509587" target="_blank">
                    <img src="../images/uutiset/Tommi_Miettinen_TPS.webp" alt="turun palloseuran päävalmentaja tommi miettinen">
                    <h3 class="img-header">TPS:n päävalmentaja lyttäsi pelaajansa murskatappion jälkeen: "Viettivät vapaapäivää</h3>
                </a>
            </div>
        -->
        </article>
    </main>
    <footer>
        <h3><a href="./contact.php">Contact us</a></h3>
        <h3>Kouluprojekti</h3>
    </footer>
</body>
</html>