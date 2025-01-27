<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class VisitasController extends Controller
{
    function visitas()
    {
        $lugares = [
            "España" => [
                ["Madrid", "Capital de España, conocida por su historia, arte y cultura.", "https://es.wikipedia.org/wiki/Madrid", asset('imagenes/madrid.jpg')],
                ["Barcelona", "Famosa por su arquitectura modernista, como la Sagrada Familia.", "https://es.wikipedia.org/wiki/Barcelona", asset('imagenes/barcelona.jpg')],
                ["Extremadura", "Región histórica con paisajes naturales y pueblos encantadores.", "https://es.wikipedia.org/wiki/Extremadura", asset('imagenes/extremadura.jpg')]
            ],
            "Francia" => [
                ["París", "La Ciudad de la Luz, conocida por la Torre Eiffel y el Louvre.", "https://es.wikipedia.org/wiki/Par%C3%ADs", asset('imagenes/paris.jpg')],
                ["Lyon", "Famosa por su gastronomía y arquitectura renacentista.", "https://es.wikipedia.org/wiki/Lyon", asset('imagenes/lyon.jpg')],
                ["Marsella", "Ciudad portuaria con influencia multicultural y playas hermosas.", "https://es.wikipedia.org/wiki/Marsella", asset('imagenes/marsella.jpg')]
            ],
            "Italia" => [
                ["Roma", "La Ciudad Eterna, hogar del Coliseo y el Vaticano.", "https://es.wikipedia.org/wiki/Roma", asset('imagenes/roma.jpg')],
                ["Venecia", "Ciudad de los canales y los románticos paseos en góndola.", "https://es.wikipedia.org/wiki/Venecia", asset('imagenes/venecia.jpg')],
                ["Florencia", "Cuna del Renacimiento y famosa por su arte y arquitectura.", "https://es.wikipedia.org/wiki/Florencia", asset('imagenes/florencia.jpg')]
            ],
            "Alemania" => [
                ["Berlín", "Capital moderna con una rica historia y vibrante vida nocturna.", "https://es.wikipedia.org/wiki/Berl%C3%ADn", asset('imagenes/berlin.jpg')],
                ["Múnich", "Famosa por el Oktoberfest y su arquitectura bávara.", "https://es.wikipedia.org/wiki/M%C3%BAnich", asset('imagenes/munich.jpg')],
                ["Hamburgo", "Ciudad portuaria con una próspera escena cultural.", "https://es.wikipedia.org/wiki/Hamburgo", asset('imagenes/hamburgo.jpg')]
            ],
            "Reino Unido" => [
                ["Londres", "Capital del Reino Unido, conocida por el Big Ben y el Támesis.", "https://es.wikipedia.org/wiki/Londres", asset('imagenes/londres.jpg')],
                ["Manchester", "Centro industrial con una rica tradición musical.", "https://es.wikipedia.org/wiki/Manchester", asset('imagenes/manchester.jpg')],
                ["Edimburgo", "Ciudad histórica, hogar del famoso Castillo de Edimburgo.", "https://es.wikipedia.org/wiki/Edimburgo", asset('imagenes/edimburgo.jpg')]
            ],
            "Estados Unidos" => [
                ["Nueva York", "La ciudad que nunca duerme, famosa por Times Square y Central Park.", "https://es.wikipedia.org/wiki/Nueva_York", asset('imagenes/newyork.jpg')],
                ["Los Ángeles", "Hogar de Hollywood y sus playas soleadas.", "https://es.wikipedia.org/wiki/Los_%C3%81ngeles", asset('imagenes/losangeles.jpg')],
                ["Chicago", "La Ciudad de los Vientos, conocida por su arquitectura y museos.", "https://es.wikipedia.org/wiki/Chicago", asset('imagenes/chicago.jpg')]
            ],
            "Japón" => [
                ["Tokio", "Capital de Japón, mezcla de modernidad y tradición.", "https://es.wikipedia.org/wiki/Tokio", asset('imagenes/tokio.jpg')],
                ["Kioto", "Ciudad histórica con templos y jardines zen.", "https://es.wikipedia.org/wiki/Kioto", asset('imagenes/kioto.jpg')],
                ["Osaka", "Ciudad vibrante con una rica cultura gastronómica.", "https://es.wikipedia.org/wiki/Osaka", asset('imagenes/osaka.jpg')]
            ],
            "México" => [
                ["Ciudad de México", "Capital con una rica historia y vida cultural.", "https://es.wikipedia.org/wiki/Ciudad_de_M%C3%A9xico", asset('imagenes/ciudaddemexico.jpg')],
                ["Guadalajara", "Cuna del mariachi y el tequila.", "https://es.wikipedia.org/wiki/Guadalajara_(M%C3%A9xico)", asset('imagenes/guadalajara.jpg')],
                ["Monterrey", "Centro industrial rodeado de montañas.", "https://es.wikipedia.org/wiki/Monterrey", asset('imagenes/monterrey.jpg')]
            ],
            "Argentina" => [
                ["Buenos Aires", "La París de América del Sur, conocida por el tango.", "https://es.wikipedia.org/wiki/Buenos_Aires", asset('imagenes/buenosaires.jpg')],
                ["Córdoba", "Ciudad con historia colonial y hermosa arquitectura.", "https://es.wikipedia.org/wiki/C%C3%B3rdoba_(Argentina)", asset('imagenes/cordoba.jpg')],
                ["Mendoza", "Famosa por sus viñedos y el vino Malbec.", "https://es.wikipedia.org/wiki/Mendoza", asset('imagenes/mendoza.jpg')]
            ]
        ];
        
        return view("visitas", compact("lugares"));
    }
}



