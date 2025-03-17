<template >
    <div class="container-fluid">
        <div class="cartelera-film">

            <div class="film-title">
              LOS INCREIBLES
            </div>
            <ul>
                <li>DURACIÓN: 120 min</li>
                <li>Edad: +12</li>
            </ul>
            <p>Un empleado de oficina insome en busca de una manera de cambiar su vida se cruza con un vendedor y crean un
                club de lucha clandestino como forma de terapia,, pero la mayoría sufrió alteraciones en alguna manera, ya
                sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar
                un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del
                texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos
                predefinidos cuando sea necesario</p>

            <ul class="hora-film">
                <a href="">10:00</a>
                <a href="">11:00</a>
                <a href="">12:30</a>
                <a href="">15:00</a>
                <a href="">18:00</a>
            </ul>
        </div>

    </div>

</template>
<script>
export default {

}
</script>
<style >

.cartelera-film {
    position: relative;
    width: 1200px;
    height: 350px;
    left: 400px;
    margin-top: 10px;
    padding: 1em;
    overflow: hidden;
    align-items: center;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    color: rgb(255, 255, 255);
    object-fit: cover;
    background-image: url('https://lumiere-a.akamaihd.net/v1/images/eu_incredibles-2_article_char2_r_41551334.jpeg?region=0,0,1200,725');
    background-size: cover;
    background-position: center;

}


.cartelera-film * {
    position: relative;
    z-index: 2;
}

.cartelera-film::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.486);
    z-index: 1;
}

.film-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 15px;
    text-align: center;
}

.film-title {
    font-size: 52px;
    font-weight: bold;
    margin-bottom: 10px;
}

.film-description {
    font-size: 14px;
    margin-bottom: 10px;
    font-family: Arial, Helvetica, sans-serif;
}

.hora-film {
    display: flex;
    gap: 5px;
    margin-top: 10px;
}

.hora-film a {
    margin-top: 20px;
    width: 100%;
    background-color: #2EBFA5;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;

}

.hora-film a:hover {
    background-color:  #29cfb1;
}

.cartelera-dia{
    color: #EAD2AC;
    font-size: 100px;
    padding-left: 20%;
}

</style>
