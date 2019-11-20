<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public $arrayPeliculas = array(
        array(
            'title' => 'El padrino',
            'year' => '1972',
            'director' => 'Francis Ford Coppola',
            'poster' => 'http://es.web.img2.acsta.net/c_215_290/pictures/18/06/12/12/12/0117051.jpg',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.'
        ),
        array(
            'title' => 'El Padrino. Parte II',
            'year' => '1974',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://www.ecured.cu/images/thumb/7/76/El_padrino_II.jpg/260px-El_padrino_II.jpg',
            'rented' => false,
            'synopsis' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.'
        ),
        array(
            'title' => 'La lista de Schindler',
            'year' => '1993',
            'director' => 'Steven Spielberg',
            'poster' => 'http://es.web.img3.acsta.net/c_215_290/pictures/19/02/12/18/49/4078948.jpg',
            'rented' => false,
            'synopsis' => 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.'
        ),
        array(
            'title' => 'Pulp Fiction',
            'year' => '1994',
            'director' => 'Quentin Tarantino',
            'poster' => 'https://pics.filmaffinity.com/Pulp_Fiction-210382116-large.jpg',
            'rented' => true,
            'synopsis' => 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. '
        ),
        array(
            'title' => 'Cadena perpetua',
            'year' => '1994',
            'director' => 'Frank Darabont',
            'poster' => 'https://pics.filmaffinity.com/Cadena_perpetua-576140557-large.jpg',
            'rented' => true,
            'synopsis' => 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.'
        ),
        array(
            'title' => 'El golpe',
            'year' => '1973',
            'director' => 'George Roy Hill',
            'poster' => 'data:image/jpeg;base64,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',
            'rented' => false,
            'synopsis' => 'Chicago, años treinta. Redford y Newman son dos timadores que deciden vengar la muerte de un viejo y querido colega, asesinado por orden de un poderoso gángster (Robert Shaw). Para ello urdirán un ingenioso y complicado plan con la ayuda de todos sus amigos y conocidos.'
        ),
        array(
            'title' => 'La vida es bella',
            'year' => '1997',
            'director' => 'Roberto Benigni',
            'poster' => 'https://imagessl6.casadellibro.com/m/ig/6/2128386.jpg',
            'rented' => true,
            'synopsis' => 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo (Toscana) con la intención de abrir una librería. Allí conoce a Dora y, a pesar de que es la prometida del fascista Ferruccio, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.'
        ),
        array(
            'title' => 'Uno de los nuestros',
            'year' => '1990',
            'director' => 'Martin Scorsese',
            'poster' => 'https://pics.filmaffinity.com/Uno_de_los_nuestros-722948658-large.jpg',
            'rented' => false,
            'synopsis' => 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría. '
        ),
        array(
            'title' => 'Alguien voló sobre el nido del cuco',
            'year' => '1975',
            'director' => 'Milos Forman',
            'poster' => 'https://www.anagrama-ed.es/uploads/media/portadas/0001/19/145cf6a43765ac8373b05b33f33df842e9c096a1.jpeg',
            'rented' => false,
            'synopsis' => 'Randle McMurphy (Jack Nicholson), un hombre condenado por asalto, y un espíritu libre que vive contracorriente, es recluido en un hospital psiquiátrico. La inflexible disciplina del centro acentúa su contagiosa tendencia al desorden, que acabará desencadenando una guerra entre los pacientes y el personal de la clínica con la fría y severa enfermera Ratched (Louise Fletcher) a la cabeza. La suerte de cada paciente del pabellón está en juego.'
        ),
        array(
            'title' => 'American History X',
            'year' => '1998',
            'director' => 'Tony Kaye',
            'poster' => 'https://http2.mlstatic.com/america-x-american-history-x-skin-heads-dvd-D_NQ_NP_997237-MLA26472337472_122017-F.jpg',
            'rented' => false,
            'synopsis' => 'Derek (Edward Norton), un joven "skin head" californiano de ideología neonazi, fue encarcelado por asesinar a un negro que pretendía robarle su furgoneta. Cuando sale de prisión y regresa a su barrio dispuesto a alejarse del mundo de la violencia, se encuentra con que su hermano pequeño (Edward Furlong), para quien Derek es el modelo a seguir, sigue el mismo camino que a él lo condujo a la cárcel.'
        ),
        array(
            'title' => 'Sin perdón',
            'year' => '1992',
            'director' => 'Clint Eastwood',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/I/61ELZIraHbL._SY445_.jpg',
            'rented' => false,
            'synopsis' => 'William Munny (Clint Eastwood) es un pistolero retirado, viudo y padre de familia, que tiene dificultades económicas para sacar adelante a su hijos. Su única salida es hacer un último trabajo. En compañía de un viejo colega (Morgan Freeman) y de un joven inexperto (Jaimz Woolvett), Munny tendrá que matar a dos hombres que cortaron la cara a una prostituta.'
        ),
        array(
            'title' => 'El precio del poder',
            'year' => '1983',
            'director' => 'Brian De Palma',
            'poster' => 'https://pics.filmaffinity.com/El_precio_del_poder-846203734-large.jpg',
            'rented' => false,
            'synopsis' => 'Tony Montana es un emigrante cubano frío y sanguinario que se instala en Miami con el propósito de convertirse en un gángster importante. Con la colaboración de su amigo Manny Rivera inicia una fulgurante carrera delictiva con el objetivo de acceder a la cúpula de una organización de narcos.'
        ),
        array(
            'title' => 'El pianista',
            'year' => '2002',
            'director' => 'Roman Polanski',
            'poster' => 'http://es.web.img3.acsta.net/c_215_290/pictures/14/05/27/12/07/438875.jpg',
            'rented' => true,
            'synopsis' => 'Wladyslaw Szpilman, un brillante pianista polaco de origen judío, vive con su familia en el ghetto de Varsovia. Cuando, en 1939, los alemanes invaden Polonia, consigue evitar la deportación gracias a la ayuda de algunos amigos. Pero tendrá que vivir escondido y completamente aislado durante mucho tiempo, y para sobrevivir tendrá que afrontar constantes peligros.'
        ),
        array(
            'title' => 'Seven',
            'year' => '1995',
            'director' => 'David Fincher',
            'poster' => 'https://pics.filmaffinity.com/Seven_Se7en-734875211-large.jpg',
            'rented' => true,
            'synopsis' => 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta.'
        ),
        array(
            'title' => 'El silencio de los corderos',
            'year' => '1991',
            'director' => 'Jonathan Demme',
            'poster' => 'https://pics.filmaffinity.com/El_silencio_de_los_corderos-709332889-large.jpg',
            'rented' => false,
            'synopsis' => 'El FBI busca a "Buffalo Bill", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel. Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerrado a Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de "Buffalo Bill".'
        ),
        array(
            'title' => 'La naranja mecánica',
            'year' => '1971',
            'director' => 'Stanley Kubrick',
            'poster' => 'https://www.cuspide.com/content/cover/large/9789505470877_1.jpg?id_com=1113',
            'rented' => false,
            'synopsis' => 'Gran Bretaña, en un futuro indeterminado. Alex (Malcolm McDowell) es un joven muy agresivo que tiene dos pasiones: la violencia desaforada y Beethoven. Es el jefe de la banda de los drugos, que dan rienda suelta a sus instintos más salvajes apaleando, violando y aterrorizando a la población. Cuando esa escalada de terror llega hasta el asesinato, Alex es detenido y, en prisión, se someterá voluntariamente a una innovadora experiencia de reeducación que pretende anular drásticamente cualquier atisbo de conducta antisocial.'
        ),
        array(
            'title' => 'La chaqueta metálica',
            'year' => '1987',
            'director' => 'Stanley Kubrick',
            'poster' => 'https://pics.filmaffinity.com/La_chaqueta_met_lica-577943737-large.jpg',
            'rented' => true,
            'synopsis' => 'Un grupo de reclutas se prepara en Parish Island, centro de entrenamiento de la marina norteamericana. Allí está el sargento Hartman, duro e implacable, cuya única misión en la vida es endurecer el cuerpo y el alma de los novatos, para que puedan defenderse del enemigo. Pero no todos los jóvenes están preparados para soportar sus métodos. '
        ),
        array(
            'title' => 'Blade Runner',
            'year' => '1982',
            'director' => 'Ridley Scott',
            'poster' => 'https://pics.filmaffinity.com/Blade_Runner-421258957-large.jpg',
            'rented' => true,
            'synopsis' => 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba "retiro". '
        ),
        array(
            'title' => 'Taxi Driver',
            'year' => '1976',
            'director' => 'Martin Scorsese',
            'poster' => 'https://pics.filmaffinity.com/Taxi_Driver-712853056-large.jpg',
            'rented' => false,
            'synopsis' => 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad. Y un día decide pasar a la acción.'
        ),
        array(
            'title' => 'El club de la lucha',
            'year' => '1999',
            'director' => 'David Fincher',
            'poster' => 'https://www.cinconoticias.com/wp-content/uploads/el-club-de-la-lucha-portada.jpg',
            'rented' => true,
            'synopsis' => 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.'
        )
    );

    public function getIndex()
    {
        return view('catalog.index', array('arrayPeliculas' => $this->arrayPeliculas));
    }

    public function getShow($id)
    {
        return view('catalog.show', array('pelicula' => $this->arrayPeliculas[$id], 'id'=>$id));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        return view('catalog.edit', array('id' => $id));
    }
}
