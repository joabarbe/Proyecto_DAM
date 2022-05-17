-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2022 a las 13:05:41
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreriacaltan`
--
CREATE DATABASE IF NOT EXISTS `libreriacaltan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `libreriacaltan`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellidos_cliente` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telef` int(20) NOT NULL,
  `direcc` varchar(100) NOT NULL,
  `observaciones` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `apellidos_cliente`, `correo`, `telef`, `direcc`, `observaciones`) VALUES
(1, 'ana', 'barragan', 'ana@example.com', 987654321, 'madrid', 'consulta'),
(4, 'joaquin', 'barragan', 'joaquin@example.com', 234567890, 'madrid', 'pregunta sobre libro'),
(8, 'carmen', 'blanco', 'carmen@example.com', 890123456, 'badajoz', 'sobre algo'),
(9, 'Juan', 'González Blanco', 'juan@example.com', 456576878, 'Galicia', 'Pregunta sobre el stock de un libro'),
(10, 'Pedro', 'Ramírez ', 'pedro@example.com', 124578654, 'Badajoz', 'Quiere recibir noticias sobre un libro'),
(11, 'Fátima ', 'López ', 'fatima@example.com', 568923456, 'Málaga', 'Quiero recibir la últimas noticias'),
(12, 'Joaquín', 'Gómez ', 'joaquin.ma45168@cesurformacion.com', 127890563, 'Badajoz', 'Me gustaría saber cuando sale un libro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID`, `nombre`, `autor`, `precio`, `stock`, `imagen`, `descripcion`, `categoria`) VALUES
(29, 'Harry Potter y La piedra filosofal', 'J.K. Rowling', 30, 0, '1652520773_harry1.jpg', 'Harry Potter se ha quedado huérfano y vive en casa de sus abominables tíos y del insoportable primo Dudley. Harry se siente muy triste y solo, hasta que un buen día recibe una carta que cambiará su vida para siempre. En ella le comunican que ha sido aceptado como alumno en el colegio interno Hogwarts de magia y hechicería. A partir de ese momento, la suerte de Harry da un vuelco espectacular. En esa escuela tan especial aprenderá encantamientos, trucos fabulosos y tácticas de defensa contra las malas artes. Se convertirá en el campeón escolar de quidditch, especie de fútbol aéreo que se juega montado sobre escobas, y se hará un puñado de buenos amigos... aunque también algunos temibles enemigos. Pero sobre todo, conocerá los secretos que le permitirán cumplir con su destino. Pues, aunque no lo parezca a primera vista, Harry no es un chico común y corriente. ¡Es un verdadero mago!', 'ficcion'),
(35, 'Harry Potter y La cámara secreta', 'J.K. Rowling', 25, 3, '1652250621_harry2.jpg', 'Tras derrotar una vez más a lord Voldemort, su siniestro enemigo en Harry Potter y la piedra filosofal, Harry espera impaciente en casa de sus insoportables tíos el inicio del segundo curso del Colegio Hogwarts de Magia y Hechicería. Sin embargo, la espera dura poco, pues un elfo aparece en su habitación y le advierte que una amenaza mortal se cierne sobre la escuela. Así pues, Harry no se lo piensa dos veces y, acompañado de Ron, su mejor amigo, se dirige a Hogwarts en un coche volador. Pero ¿puede un aprendiz de mago defender la escuela de los malvados que pretenden destruirla? Sin saber que alguien ha abierto la Cámara de los Secretos, dejando escapar una serie de monstruos peligrosos, Harry y sus amigos Ron y Hermione tendrán que enfrentarse con arañas gigantes, serpientes encantadas, fantasmas enfurecidos y, sobre todo, con la mismísima reencarnación de su más temible adversario.', 'ficcion'),
(36, 'Harry Potter y El prisionero de Azkaban', 'J.K. Rowling', 23, 10, '1652132282_harry3.jpg', 'De la prisión de Azkaban se ha escapado un terrible villano, Sirius Black, un asesino en serie que fue cómplice de lord Voldemort y que, dicen los rumores, quiere vengarse de Harry por haber destruido a su maestro. Por si esto fuera poco, entran en acción los dementores, unos seres abominables capaces de robarles la felicidad a los magos y de eliminar todo recuerdo hermoso de aquellos que se atreven a acercárseles. El desafío es enorme, pero Harry, Ron y Hermione son capaces de enfrentarse a todo esto y mucho más.', 'ficcion'),
(37, 'Harry Potter y El cáliz de fuego', 'J.K. Rowling', 21, 12, '1652132318_harry4.jpg', 'Tras otro abominable verano con los Dursley, Harry se dispone a iniciar el cuarto curso en Hogwarts, la famosa escuela de magia y hechicería. A sus catorce años, a Harry le gustaría ser un joven mago como los demás y dedicarse a aprender nuevos sortilegios, encontrarse con sus amigos Ron y Hermione y asistir con ellos a los Mundiales de quidditch. Sin embargo, al llegar al colegio le espera una gran sorpresa que lo obligará a enfrentarse a los desafíos más temibles de toda su vida. Si logra superarlos, habrá demostrado que ya no es un niño y que está preparado para vivir las nuevas y emocionantes experiencias que el futuro le depara.', 'ficcion'),
(38, 'Harry Potter y La orden del fénix', 'J.K. Rowling', 27, 11, '1652132369_harry5.jpg', 'Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad. El Ministerio de Magia niega que Voldemort haya regresado y ha iniciado una campaña de desprestigio contra Harry y Dumbledore, para lo cual ha asignado a la horrible profesora Dolores Umbridge la tarea de vigilar todos sus movimientos. Así pues, además de sentirse solo e incomprendido, Harry sospecha que Voldemort puede adivinar sus pensamientos, e intuye que el temible mago trata de apoderarse de un objeto secreto que le permitiría recuperar su poder destructivo.', 'ficcion'),
(39, 'Harry Potter y El misterio del príncipe', 'J.K. Rowling', 25, 15, '1652132412_harry6.jpg', 'Con dieciséis años cumplidos, Harry inicia el sexto curso en Hogwarts en medio de terribles acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco. A pesar de los férreos controles de seguridad que protegen la escuela, dos alumnos son brutalmente atacados. Dumbledore sabe que se acerca el momento, anunciado por la Profecía, en que Harry y Voldemort se enfrentarán a muerte: «El único con poder para vencer al Señor Tenebroso se acerca... Uno de los dos debe morir a manos del otro, pues ninguno de los dos podrá vivir mientras siga el otro con vida.». El anciano director solicitará la ayuda de Harry y juntos emprenderán peligrosos viajes para intentar debilitar al enemigo, para lo cual el joven mago contará con la ayuda de un viejo libro de pociones perteneciente a un misterioso príncipe, alguien que se hace llamar Príncipe Mestizo.', 'ficcion'),
(40, 'Harry Potter y Las reliquias de la muerte', 'J.K. Rowling', 26, 10, '1652132449_harry7.jpg', 'La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento protector que lo mantiene a salvo. El anunciado duelo a muerte con lord Voldemort es inminente, y la casi imposible misión de encontrar y destruir los restantes Horrocruxes, más urgente que nunca. Ha llegado la hora final, el momento de tomar decisiones difíciles. Harry debe abandonar la calidez y seguridad de La Madriguera para seguir sin miedo ni vacilaciones el inexorable sendero trazado para él. Consciente de lo mucho que está en juego, tendrá que buscar en su interior la fuerza necesaria que lo impulse en la vertiginosa carrera para enfrentarse a su destino.', 'ficcion'),
(50, 'África. Tormenta de libertad', 'H. Lanvers', 16, 20, '1652477467_africa-tormenta.jpg', 'La esclavitud ya no existe, aseguran los gobiernos de África Central, pero Nelson Mandela sabe que eso no es cierto. En 2005, mientras el legendario ex presidente de Sudáfrica relata su vida a un escritor inglés en su casa de campo, una joven periodista de Kenia es secuestrada por un famoso traficante de esclavos en Mauritania. Haruj Pashá, apodado El Rey de los Negreros, se dedica al comercio de muchachas y niños de increíble exotismo y belleza y sus ejemplares se venden por pequeñas fortunas en los harenes de los países árabes. Su comprador principal es un conocido gobernante del norte africano y hacia allí llevará Haruj a su caravana, a través de desiertos y selvas. Tom Grant, el novio de la muchacha cautiva, un sudafricano veterano dela Guerra de Angola, junto a sus amigos, intentará rescatarla.', 'accion'),
(51, 'Alto riesgo. Libro de Acción', 'Ken Follett', 23, 15, '1652477750_alto-riesgo.jpg', 'El día D se acerca. Todavía no se sabe dónde ni cuándo, pero los alemanes están convencidos de que será pronto. Felicity Clariet, Flick, es una de las agentes más valiosas de la unidad encargada de las operaciones de sabotaje que opera en el norte de Francia. A Flick le consta que el éxito del desembarco aliado depende de que las líneas de comunicación con Berlín no funcionen. Y es en Sainte-Cécile, cerca de Reims, donde se encuentra el mayor centro de comunicaciones de la Francia ocupada, alojado en un antiguo castillo del siglo XVII. En estos momentos ese siniestro castillo constituye el objetivo de mayor importancia estratégica.', 'accion'),
(52, 'Aguas peligrosas. Libro de Acción', 'Bernard Cornwell', 14, 20, '1652478023_aguas-peligrosas.jpg', 'En las Bahamas se encuentra una exótica isla utilizada como centro de operaciones de una banda de narcotraficantes. Un afamado marino recibe el encargo de cuidar a los dos hijos drogadictos de un senador, y esto lo llevara a tener peligrosos conflictos con la siniestra banda. Aguas peligrosas es un interesante thriller de acción, obra del autor Bernard Cornwell, el cual, en esta ocasión, se aleja de su habitual trayectoria dedicada en su mayor parte a la novela histórica, campo en el que es muy conocido.', 'accion'),
(53, 'El oro de Esparta. Libro de Acción', 'Clive Cussler', 18, 17, '1652478219_oro-esparta.jpg', 'En el año 1800, mientras cruzaba los Alpes Peninos con sus tropas, Napoleón realizó un hallazgo asombroso: un tesoro persa perdido hacía siglos. Incapaz de transportarlo, dibujó en doce botellas de vino un enigmático mapa. A su muerte, el emperador se llevó consigo su último secreto, pues la curiosa bodega se dispersó por el mundo. Sam y Reimi Fargo, dueños de la fundación Fargo, están rastreando tesoros en Maryland. Lo que hallan en el fondo de un pantano no es lo que esperaban: un pequeño submarino de la Segunda Guerra Mundial. En su interior hay una extraña botella, que tal vez perteneciera a la mítica reserva personal de Napoleón. Fascinados por el descubrimiento, no tardarán en emprender la búsqueda del resto de la colección.', 'accion'),
(54, 'El renacido. Libro de Acción', 'Michael Punke', 17, 30, '1652478549_el-renacido.jpg', '1823. Hugh Glass es uno de los tramperos más experimentados y respetados de la frontera en el noroeste de los Estados Unidos, donde enfrenta a diario los peligros de la naturaleza salvaje y de las belicosas tribus indias. Inesperadamente, el ataque de una osa lo deja gravemente herido y ninguno de sus compañeros confía en que sobrevivirá. Cuando los dos hombres encargados de cuidarlo hasta su muerte lo abandonan, él luchará por mantenerse con vida movido por un único deseo: la venganza.', 'accion'),
(55, 'La tumba perdida. Libro de Acción', 'Nacho Ares', 19, 26, '1652478694_tumba-perdida.jpg', '1922. El arqueólogo Howard Carter está en la cumbre de su carrera tras haber revelado al mundo el hallazgo más importante sobre el Antiguo Egipto: la tumba de Tutankhamón, el faraón niño. Sin embargo, su instinto, guiado por la inscripción de una lasca de piedra caliza, le dice que el Valle de los Reyes esconde otro sepulcro importante: un lugar que se selló con sangre y que, tal vez, no debería ser profanado. Un apasionante recorrido por el Egipto de los faraones y el de los hombres que, con tenacidad y pasión, sacaron a la luz los secretos enterrados de una civilización tan enigmática como fascinante.', 'accion'),
(56, '24 besos. Novela Romántica', 'Caroline March', 14, 27, '1652478872_besos-24.jpg', 'Una novela romántica que es un auténtico juego de espejos, un escenario en el que todo el mundo miente y es incapaz de admitir sus auténticos deseos.\r\nÁlex es inconformista, reaccionaria, soñadora y una aventurera incansable hasta que sucede algo terrible y tiene que cambiar la perspectiva con la que ve su futuro. Cuando piensa que ya no hay salida, una descabellada propuesta trastocará su existencia. \r\nUn viaje a Londres, una familia metomentodo y el reencuentro con un antiguo amor provocarán que Álex decida recuperar con más ahínco lo que creía que ya había perdido, y aunque continúe tropezándose una y otra vez con la misma piedra, se enfrenta a la adversidad con mucho humor… \r\n24 besos nos recuerda la importancia de vivir el presente sin pensar en el mañana.', 'romantica'),
(57, '¿Quién eres?. Novela Romántica', 'Megan Maxwell', 21, 21, '1652479083_quien-eres.jpg', 'Un thriller romántico que nos demuestra que el miedo nos puede impedir alcanzar lo que deseamos, lo que necesitamos o lo que soñamos. Atrévete a ganarle la partida y, sobre todo, ¡a ser feliz!\r\nMartina es profesora y se resiste a tener que comunicarse con las personas a través de una pantalla, algo que se está poniendo muy de moda en la España de los noventa. Los chats atraen a todo el mundo, pero, sin duda, comienzan a ser una gran fuente de problemas.\r\nY justo eso es lo que se encuentra Martina cuando, animada por unos amigos, acepta que entre en su casa, en su salón y en su vida su primer ordenador. Chats, amigos, risas, noches interminables de diversión... Todo se vuelve idílico cuando una persona de ese nuevo mundo, a quien ni ha visto nunca ni conoce, llama su atención, y su sola presencia a través de la pantalla la atrae cada vez más.', 'romantica'),
(58, 'A contracorriente. Novela Romántica', 'Noe Casado', 18, 23, '1652479203_a-contracorriente.jpg', 'Para una mujer como Samantha, recibir propuestas de matrimonio es como el pan nuestro de cada día. Ella sabe perfectamente cuál es el motivo por el que despierta tanto interés. Es la heredera que puede ayudar a un don nadie a dar un salto cualitativo en el escalafón social o sencillamente aportar una buena dote a algún otro heredero deseoso de aumentar su riqueza. Pero es consciente de que ninguno de la larga fila de «pasmarotes sin sangre» que la invitan a salir ve más allá, no la ven como la mujer que es. Por lo que rechaza diplomáticamente sus propuestas y se ha resignado a estar sola. Hasta que tropieza con un hombre que es todo lo contrario a lo que está acostumbrada. No es para nada amable, ni considerado, ni la llevará a cenar ni mucho menos al altar. ¡Es perfecto!. Premio Terciopelo', 'romantica'),
(59, ' Cincuenta sombras de Grey', 'E. L. James', 25, 23, '1652479352_sombras-grey.jpg', 'Cuando la estudiante de literatura Anastasia Steele acude para hacerle una entrevista al joven y exitoso empresario Christian Grey para el periódico universitario en el que colabora, se encuentra con un hombre que le resulta atractivo, enigmático y tremendamente intimidante. Completamente convencida de que su encuentro ha sido todo un fracaso, intenta olvidarse de Grey... hasta que a él se le ocurre aparecer por la ferretería en la que Ana trabaja a tiempo parcial.\r\nLa idealista e inocente Ana se queda asombrada cuando se da cuenta de que desea con todas sus fuerzas a ese hombre, y el que él la advierta de que se mantenga alejada sólo hace que su desesperación por estar con él aumente.\r\nIncapaz de resistirse a la inteligencia y serena belleza de Ana y a su espíritu independiente, Grey termina por admitir que también la desea... pero con sus propias condiciones.', 'romantica'),
(60, 'Cincuenta sombras más oscuras', 'E. L. James', 25, 21, '1652479543_sombras-oscuras.jpg', 'Intimidada por las peculiares prácticas eróticas y los oscuros secretos del atractivo y atormentado empresario Christian Grey, Anastasia Steele decide romper con él y embarcarse en una nueva carrera profesional en una editorial de Seattle.\r\nPero el deseo por Christian todavía domina cada uno de sus pensamientos, y cuando finalmente él le propone retomar su aventura, Ana no puede resistirse. Reanudan entonces su tórrida y sensual relación, pero mientras Christian lucha contra sus propios demonios del pasado, Ana debe enfrentarse a la ira y la envidia de las mujeres que la precedieron, y tomar la decisión más importante de su vida.', 'romantica'),
(61, 'Cincuenta sombras liberadas', 'E. L. James', 25, 26, '1652479645_sombras-liberadas.jpg', 'Cuando la inexperta estudiante Anastasia Steele conoció al joven, seductor y exitoso empresario Christian Grey, nació entre ellos una sensual relación que cambió sus vidas para siempre. Sin embargo, desconcertada y llevada al límite por las peculiares prácticas eróticas de Christian, la joven lucha por conseguir un mayor compromiso por parte de Grey. Y Christian accede con tal de no perderla.\r\nAhora, Ana y Christian lo tienen todo: amor, pasión, intimidad, bienestar y un mundo de infinitas posibilidades. Pero cuando parece que la fuerza de su relación puede superar cualquier obstáculo, la fatalidad, el rencor y el destino se conjuran para hacer realidad los peores miedos de Ana.', 'romantica'),
(62, 'Bésame y vente conmigo', 'Olivia Ardey', 17, 14, '1652479770_besame-vente-conmigo.jpg', 'Álvaro, Celia y Nico, tres amigos que lo compartieron todo de niños se reúnen en el funeral de un pariente millonario que, ¡oh, sorpresa!, les ha dejado en herencia su bodega centenaria y sus ricos viñedos. Sin embargo, el testamento contiene una trampa, heredará la fortuna aquel de los tres que primero se case. ¿Quién logrará hacerse con la herencia? Un viaje a Las Vegas, secretos, malentendidos, y el hallazgo de un tesoro inesperado hará que cada uno de los protagonistas acabe encontrando lo que más desea… aunque ni ellos mismos lo sepan.', 'romantica'),
(63, 'Deseo concedido. Novela romántica', 'Megan Maxwell', 17, 12, '1652479923_deseo-concedido.jpg', 'Lady Megan Phillips es una joven y bella luchadora que tiene a su cargo a sus dos hermanos pequeños. Su vida no ha sido nada fácil, por lo que ha forjado el carácter de una auténtica guerrera que no se doblega ante nada ni nadie. \r\nEl highlander Duncan McRae, más conocido como el Halcón, es un guerrero acostumbrado a liderar ejércitos, librar batallas y salir victorioso de ellas junto a su clan. Pero al llegar al castillo de Dunstaffnage para el enlace de su buen amigo Alex McDougall, se encuentra con un tipo de enemigo con el que no está acostumbrado a batallar: lady Megan Phillips, una morena que no tiene miedo a nada. \r\n¿Qué les deparará el destino a los señores McRae? ¿Conseguirán entenderse o acabarán odiándose para el resto de sus días?', 'romantica'),
(64, 'El día que el cielo se caiga', 'Megan Maxwell', 18, 19, '1652480048_dia-cielo-caiga.jpg', 'Alba y Nacho se conocen desde que eran niños. La conexión entre ellos es muy especial y aumenta con el paso de los años, hasta que ella se casa y, obligada por su marido, se distancia de él. Nacho se marcha a Londres. Allí encontrará al amor de su vida, a quien luego perderá a causa de una desconocida enfermedad. Alba, que no sabe lo mal que lo está pasando su amigo, acude a él tras su fracaso matrimonial. Su reencuentro crea una unión irrompible, pero al cabo de poco tiempo ella descubre que Nacho también está enfermo. En su afán por ayudarlo a luchar contra lo que parece inevitable, Alba conocerá a Víctor. Y lo que en un principio no son más que encuentros fortuitos, se acaba convirtiendo en un amor incondicional que le permitirá superar sus miedos e inseguridades.', 'romantica'),
(65, 'Guía del autoestopista galáctico', 'Douglas Adams', 17, 21, '1652480251_guia-galactico.jpg', 'Un jueves a la hora de comer, la Tierra es demolida para poder construir una nueva autopista hiperespacial. Arthur Dent, un tipo que esa misma mañana ha visto cómo echaban abajo su propia casa, considera que eso supera lo que una persona puede soportar. Arthur huirá de la Tierra junto a un amigo suyo, Ford Prefect, que resultará ser un extraterrestre emparentado con Zaphod Beeblebrox, un pirata esquizoide de dos cabezas, en cuya nave conocerá al resto de personajes que lo acompañarán: un androide paranoide y una terrícola que, como él, ha logrado escapar. Douglas Adams fue el creador de toda una serie de manifestaciones de la Guía del autoestopista galáctico: primero fue novela radiofónica, luego se convirtió en libro, series televisivas y teatrales, un juego de ordenador, cómics y toallas de baño. La película ascendió hasta las cumbres de la producción cinematográfica.', 'ficcion'),
(66, 'El día del relámpago. Ciencia Ficción', 'J. J. Benítez', 23, 12, '1652480385_dia-relampago.jpg', 'Tras el éxito de Caballo de Troya 9, el autor desvela algunos de los interrogantes que quedaron tras cerrar la saga. ¿Qué le sucedió al mayor tras su regreso a 1973? ¿Fue el general Curtis un traidor? ¿Murió Eliseo? ¿se hundió la cuna en el Mar Muerto? El día del relámpago desvela éstas y muchas otras incógnitas que quedaron sin respuesta en Caballo de Troya 9.', 'ficcion'),
(67, 'Ready Player One. Ciencia Ficción', 'Ernest Cline', 25, 23, '1652480526_ready-player-one.jpg', 'Estamos en el año 2044 y, como el resto de la humanidad, Wade Watts prefiere mil veces el videojuego de OASIS al cada vez más sombrío mundo real. Se asegura que esconde las diabólicas piezas de un rompecabezas cuya resolución conduce a una fortuna incalculable. Las claves del enigma están basadas en la cultura de finales del siglo XX y, durante años, millones de humanos han intentado dar con ellas, sin éxito. De repente, Wade logra resolver el primer rompecabezas del premio, y, a partir de ese momento, debe competir contra miles de jugadores para conseguir el trofeo. La única forma de sobrevivir es ganar; pero para hacerlo tendrá que abandonar su existencia virtual y enfrentarse a la vida y al amor en el mundo real, del que siempre ha intentado escapar.', 'ficcion'),
(68, 'Ready Player Two. Ciencia Ficción', 'Ernest Cline', 24, 23, '1652480687_ready-player-two.jpg', 'La secuela de Ready Player One, el best seller mundial que Steven Spielberg adaptó al cine.\r\nDías después de ganar la competición ideada por James Halliday, el fundador de OASIS, Wade Watts hace un descubrimiento que lo cambia todo. Oculto en las cajas fuertes de Halliday y a la espera de que lo encuentre su heredero, se halla un avance tecnológico que volverá a cambiar el mundo y convertirá a OASIS en un lugar mil veces más asombroso (y adictivo) de lo que Wade jamás habría creído posible. Dicho avance da pie a un nuevo acertijo y a una nueva misión, un último Huevo de Pascua de Halliday que da a entender que existe un misterioso premio. Wade también se encontrará con un nuevo rival muy peligroso, increíblemente poderoso y capaz de matar a millones de personas para conseguir lo que quiere.', 'ficcion'),
(69, 'A espaldas del lago. Cuento', 'Peter Stamm', 21, 20, '1652564599_espaldas-lago.jpg', 'Peter Stamm reúne en este libro diez relatos situados en la región de Seerücken, al sur del lago de Constanza, lugar de origen del autor. En todos ellos se retrata la vida contemporánea con humor y sensibilidad a través de situaciones cotidianas y breves diálogos que sin embargo nos descubren la complejidad de las relaciones humanas. Peter Stamm nos acerca así a unos personajes que luchan por recobrar el control de sus vidas y desterrar la soledad, el miedo y el sentimiento de fracaso o de pérdida.', 'cuentos'),
(70, 'A mí no me engañas. Cuento', 'Kelly Link', 14, 13, '1652564762_no-me-enganas.jpg', 'Kelly Link ha sido definida por Michael Chabon como «la voz más oscuramente lúdica de la ficción estadounidense». Después de la publicación en Seix Barral de Magia para lectores, los ocho cuentos de este nuevo libro de Kelly Link sumergen al lector en un universo ficticio inolvidable y expanden los límites del género del relato.\r\nHuracanes, astronautas, gemelos malvados, contrabandistas, el mago de Oz, superhéroes, iguanas, pirámides… éstos son algunos de los talismanes de una imaginación capaz de maravillarnos como pocos autores contemporáneos. Los cuentos de A mí no me engañas rebosan fantasía, pero también humor y generosidad hacia la fragilidad y las fuerzas ocultas que residen en todos nosotros.', 'cuentos'),
(71, 'Cosas peores. Cuento de Margarita García', 'Margarita García Robayo', 19, 18, '1652564990_cosas-peores.jpg', 'En siete relatos breves, Margarita García Robayo despliega su habilidad para mostrar el lado más difícil de las cosas.\r\nSus personajes, expuestos en toda su compleja humanidad, se debaten irremediablemente en un mundo en el que no acaban de encajar. Una mujer que trata de darle un orden a su nueva vida de enferma; un hombre atrapado en un hotel descomunal; las incertidumbres de una pareja frente a su hijo obeso; una destemplada reunión de familia; la morbidez, la incomunicación y el desencuentro son algunos de los temas alrededor de los cuales giran estos relatos inquietantes.\r\nLa pluma rápida y el humor, a la vez brutal y compasivo, de esta joven escritora son, como en la buena literatura, herramientas poderosas para explorar y enfrentar al lector a las pequeñas o grandes miserias de la vida cotidiana.\r\n', 'cuentos'),
(72, 'El camino de la magia. Cuento', 'Neil Gaiman', 17, 20, '1652565170_camino-magia.jpg', 'Poder. Todos lo ansiamos y ellos lo tienen. Brujas, hechiceros, magos, nigromantes, aquellos capaces de ver más allá del velo de la realidad cotidiana y de influir en los mecanismos que mueven el universo. Ellos pueden ver el futuro en una esfera de cristal, convocar seres fantásticos y transformar el plomo en oro... o a un incauto en una rana. De Gandalf a Harry Potter, la magia nunca ha sido tan excitante y popular como ahora.', 'cuentos'),
(73, 'Historias pequeñas. Cuento', 'Héctor Gomis', 23, 13, '1652565305_historias-pequenas.jpg', 'Una lechuza y un asesino, y un hombre con ataques de pánico, y un cornudo, y una hormiga con depresión, y una mujer que es un toro y su marido que es una vaca, y dos viejos boxeadores, y un anciano que va a ser feliz, y un hombre que acaba de encontrase a si mismo, y una mancha, y un loco, y un ratón, y una criatura del infierno, y una niña que quiere ser pulpo, y un mechero, y un jarrón verde con un feísimo dragón naranja...\r\nLa vida esta llena de historias extrañas.', 'cuentos'),
(74, 'Las fauces del abismo. Cuento', 'Ignacio Padilla', 14, 21, '1652565444_fauces-abismo.jpg', 'Una colección de cuentos sobre las bestias, entendidas como una alegoría de lo fieramente humano. De las arañas que alteran la memoria a los depredadores invisibles y de allí a esos seres que los grandes maestros usan para fabricar sus mejores espejos, el libro juega con la tradición de los bestiarios en la cuentística latinoamericana y los infinitos relatos orales, surgidos en todas las culturas que han vuelto la vista hacia sí mismas a través de sus monstruos: el Talmud, los tratados de alquimia, los informes de viajeros europeos del siglo XVII, el sufismo, el budismo, los gabinetes de maravillas y la narrativa miscelánea del renacimiento.', 'cuentos'),
(75, 'A simple vista. Libro de Mistero', 'Jeffrey Archer', 18, 20, '1652565648_simple-vista.jpg', 'William Warwich ha sido ascendido a Detective Sargento, aunque su ascenso implica que tanto él como el resto de su equipo han de ser reasignados a la Brigada Antidroga. De inmediato se les encarga encontrar a Ahmed Rashedi, un famoso traficante que dirige una extensa red en la parte sur de Londres. A medida que avanza la investigación, William se topa con enemigos tanto antiguos como nuevos: Adrian Heath, a quien conoce de la escuela, es ahora camello al pie de la calle, aunque pronto William lo convertirá en su informante; o Miles Faulkner, un economista que comete un error por el que podría acabar entre rejas. A medida que su equipo cierra el cerco sobre una red criminal mucho más peligrosa que cualquiera a la que se hayan enfrentado antes, William idea una trampa que nadie podría jamás anticipar, una trampa escondida a plena vista...', 'misterio'),
(76, 'Correr a ciegas. Libro de Misterio', 'Javier Díez Carmona', 23, 12, '1652567187_correr-ciegas.jpg', 'Eder Campos recibe en su domicilio de Bilbao la incomodísima visita de Koldo, un miembro activo del comando Bizkaia que pretende pasarle un comprometido paquete que debe ocultarse durante dos días. Eder, muy a pesar suyo y por su antigua amistad con Koldo, comete la torpeza de no oponerse.  \r\nEsta arriesgada aceptación propiciará que los acontecimientos se precipiten hasta el punto de abocar a Eder a un improvisado exilio en Nicaragua y a vivir constantemente acechado por diferentes perseguidores que lo han convertido en su objetivo letal.   Siguiendo la huida de Eder, el lector se adentra en la Nicaragua de las últimas décadas, en sus sueños revolucionarios y sus sinsabores políticos, en el papel de la cooperación internacional y en los misterios y la perenne belleza de aquella tierra de lagos y volcanes.', 'misterio'),
(77, 'Dama Blanca. Libro de Misterio', 'Marta Martín Girón', 23, 18, '1652569659_dama-blanca.jpg', '¿Qué hay en la mente de un asesino?\r\n¿Qué se cruza por la de la víctima al caer en sus manos?\r\nLos detectives Yago Reyes y Aines Collado se enfrentan a uno de los peores casos de sus carreras como detectives de homicidios. La víctima, una joven de apenas quince años, es hallada muerta y semidesnuda en los arrozales de la localidad valenciana de Cullera. Comienza así una investigación a contrarreloj para atrapar al culpable. A cada paso dado, aumentan las sospechas de que alguien de su entorno más cercano pudo ser el responsable de su muerte. Sin embargo, ahondar en sus vidas hará que salgan a la luz secretos terribles; el precio a pagar será muy alto.\r\nUn crimen inquietante, un rastro que conducirá a una dolorosa verdad. Descubre Dama Blanca, la novela negra que te hará cuestionar los límites de lo prohibido.', 'misterio'),
(78, 'El asesino inconformista', 'Carlos Bardem', 17, 12, '1652569837_asesino-inconformista.jpg', 'Fortunato es un asesino a sueldo, culto, elegante y discreto. Cuando se le encarga que elimine a una política corrupta, recuerda su infancia y juventud, cómo sintió crecer la violencia dentro y qué hizo para controlarla y usarla, según él, en beneficio propio y de los demás. Pero esta educación sentimental es solo el principio de un viaje que le llevará por los escenarios más oscuros y violentos de nuestra sociedad y le hará replantearse su papel en ella. Una odisea de décadas por Madrid y escenarios como Nueva York, Zanzíbar, Bagdad, Estocolmo o Marruecos. Y es también la historia de un asesino enamorado, la radiografía de una pareja. ¿Estará dispuesto a sacrificar al amor de su vida por seguir sus ideales hasta el final? ¿Será este su último encargo?', 'misterio'),
(79, 'Justo. Un libro de Misterio', 'Carlos Bassas', 24, 12, '1652569984_justo.jpg', 'La verdadera justicia debe ser fría, implacable, desapasionada. Y para aplicarla, Dios decidió que cada generación contara con treinta y seis Justos, los tzadik, hombres anónimos que mantienen el equilibrio entre el Bien y el Mal sobre la faz de la Tierra. Justo Ledesma es uno de ellos. Un viejo irascible que discurre por las calles de un barrio, el de Sant Pere, Santa Caterina i la Ribera, que ya no es el suyo; de una ciudad, Barcelona, que dejó de serlo hace tiempo. Un hombre cansado que, consciente de que su fin está cerca, decide saldar cuentas con su pasado; con un pasado que regresa de forma inesperada cincuenta años después.', 'misterio'),
(80, 'La oscuridad. Libro de Misterio', 'Ignacio Ferrando', 21, 21, '1652570256_la-oscuridad.jpg', 'Una densa oscuridad se cierne en el invierno ártico sobre Storbørg, la pequeña población donde vive Endre Solberg, un director de cine experimental que acaba de perder a su mujer en un aparente suicidio. Sin embargo, al volver a casa tras el velatorio, la encuentra viva en el salón, como si nada hubiera sucedido.\r\nDesde ese momento, el lector de La oscuridad asiste a una intriga creciente, reflejo de la que atenaza a Endre, inquieto por saber quién es esa misteriosa mujer: si se trata de un fantasma o de una impostora, del reflejo de su propia culpabilidad, o si Liv, actriz frustrada, preparó todo para una última «gran representación».', 'misterio'),
(81, '35 Kilos de Esperanza. Infantil', 'Anna Gavalda', 13, 8, '1652651021_kilos-esperanza.jpg', 'Gregorio, un auténtico manitas, es un desastre como estudiante y ya ha repetido curso dos veces. Ante la incomprensión de sus padres, su único refugio es el cobertizo de su abuelo, con quien las horas transcurren volando mientras idean y fabrican todo tipo de artilugios. Sin embargo, cuando lo expulsan del colegio, su mundo empieza a tambalearse. El libro contiene unas excelentes ilustraciones de Ximena Maier, que seguro encantarán a los más jóvenes y les facilitará la lectura. La autora Anna Gavalda publicó por primera vez el libro en 2002.', 'infantil'),
(82, '75 consejos para ser popular', 'María Frisa', 17, 10, '1652651177_consejos-popular.jpg', '¿Quieres ser popular, mucho más popular? ¿Aún no sabes cómo? No te preocupes más, la sexta entrega de «75 Consejos», el DIARIO MÁS TRONCHANTE jamás escrito, es la clave.\r\nEn 75 consejos para ser popular te cuento todo lo que hay que hacer y todo lo que no hay que hacer (y todo lo que yo he hecho y he dejado de hacer) para ser popular.\r\nAdemás, este libro incluye el Manual definitivo para dominar las redes sociales, con 31 maravillosos consejos gratis para no ser un marginado o caer en la muerte social inmediata.\r\nY no lo olvides: lo que subes permanece. Tú morirás y tus fotos seguirán ahí.', 'infantil'),
(83, 'Alas. Libro Infantil de Aprilynne Pike', 'Aprilynne Pike', 16, 16, '1652651276_alas.jpg', 'Al cumplir quince años, Laurel descubre que es un hada enviada a vivir entre los seres humanos para proteger la puerta de entrada al reino de Avalon. Empujada al centro de una centenaria lucha entre las hadas y los trolls, tendrá que escoger entre su amistad por un humano o la poderosa atracción que siente por alguien de su misma raza. En este extraordinario relato de magia, intriga y romance, todo lo que creías saber acerca de las hadas cambiará para siempre.', 'infantil'),
(84, 'Barba Azul. Libro Infantil', 'Charles Perrault', 20, 13, '1652651433_barba-azul.jpg', 'En otro tiempo vivía un hombre muy rico, que tenía hermosas casas en la ciudad y en el campo, vajilla de oro y plata, muebles muy adornados y carrozas doradas; pero, por desgracia, su barba era azul, color que le daba un aspecto tan feo y terrible que no había mujer ni joven que no huyera a su vista. Una de sus vecinas, señora de rango, tenía dos hijas muy hermosas. Le pidió una en matrimonio, dejando a la madre la elección de la que había de ser su esposa. Ninguna de las jóvenes quería casarse con él y cada cual lo endosaba a la otra, sin que la otra ni la una se decidieran a ser la mujer de un hombre que tenía la barba azul. Además, aumentaba su disgusto el hecho de que se había casado con varias mujeres antes y nadie sabía lo que de ellas había sido. Finalmente se casará con la menor de las hermanas.', 'infantil'),
(85, 'Buenas noches, Julia. Infantil', 'Carles Sala i Vila', 21, 13, '1652651537_buenas-noches-julia.jpg', 'Julia nunca hubiera imaginado que podría vivir tantas aventuras aislada en una habitación de hospital. ¡Ni que aprendería tantas cosas! Y todo gracias a su amigo Bruno, a su abuelo y, sobre todo, a un personaje muy especial que resultará ser una auténtica autoridad en el mundo de los sueños.\r\nUna historia tierna y emocionante.', 'infantil'),
(86, 'Desde que mi padre es un arbusto...', 'Joke van Leeuwen', 15, 22, '1652651658_padre-arbusto.jpg', 'Con humor, y a través de los ojos de una niña, la autora profundiza en las consecuencias de la guerra.\r\nEl padre de Ina es pastelero. Todos los días se levanta muy temprano para preparar veinte tipos de pasteles y tres tipos de tartas. Hasta que un día todo cambia. En el sur estalla la guerra entre los unos y los otros y todos los hombres tienen que ir a defender al país. Por suerte, el padre de Ina tiene un manual titulado Todo lo que debe saber un buen soldado, el cual explica con todo detalle cómo disfrazarse de arbusto para despistar al enemigo.', 'infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `apell_cliente` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nom_cliente`, `apell_cliente`, `email`, `telefono`, `direccion`, `cantidad`, `id_libro`) VALUES
(16, 'prueba', 'adios', 'ana@example.com', 987654321, 'madrid', 4, 35),
(17, 'hola', 'barragan', 'joaquin@example.com', 234589876, 'madrid', 3, 29),
(20, 'prueba', 'blanco', 'joaquin@example.com', 234567890, 'madrid', 2, 36),
(23, 'prueba', 'barragan', 'joaquin@example.com', 987654321, 'madrid', 2, 29),
(24, 'Juan', 'González', 'juan@example.com', 654321098, 'galicia', 1, 53),
(25, 'joaquin', 'González', 'joaquin.ma45168@cesurformacion.com', 2147483647, 'Badajoz', 2, 57),
(26, 'ana', 'González Blanco', 'ana@example.com', 987654321, 'Badajoz', 3, 68),
(27, 'Carlos', 'Hernández ', 'carlos@example.com', 2147483647, 'sevilla', 1, 81),
(30, 'Matías', 'Rodríguez ', 'matias@example.com', 345566763, 'madrid', 2, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasenia`, `rol`) VALUES
(11, 'joaquin', '$2y$10$d/QaGLsqCR9lV0EVuN0abuZyQCQ.ECDaBELUFmENqAbFmq6y5r4lC', 'administrador'),
(14, 'fatima', '$2y$10$uPWndga2o6VtccWv/s7OzuyDFG5.M3RImtcDNQwmvwjJizM4TVLQC', 'administrador'),
(16, 'ana', '$2y$10$y4ikBi4czAjZe6YninPmsOSVkXSlshShMzihTu5mHTE1XMjexskEu', 'empleado'),
(18, 'carmen', '$2y$10$6BQ3D8Ga4kXg6snRsewWK.IpvDTu./Pi4t4I43QUcZUcTmpBqD2I6', 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_clientes_libros` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
