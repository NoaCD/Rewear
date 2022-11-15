@extends('layouts.rewear-azul')
@if (session('locale') == 'es')
    @section('title', 'Preguntas frecuentes - Rewear')
@else
    @section('title', 'Frequent questions - Rewear')
@endif
@section('content')
<section id="faq">
    <div class="container">
        <h1 class="gelion-bold pb-4">
            {{__('Preguntas frecuentes')}}
        </h1>
        <div class="faq">
            <h2 class="gelion-bold">
                {{ __('¿Qué tipo de estampado se recomienda para las prendas Rewear?') }}
            </h2>
            <p class="gelion-thin">
                {{ __('La serigrafía, el bordado y el vinil textil son las técnicas principales para estampar y generar diseños en nuestras playeras Rewear. Debido a su composición sustentable 50% algodón reciclado y 50% poliéster reciclado, otras técnicas como transfer, sublimación, impresión DTG, entre otras, pueden presentar variaciones ya que éstas requieren porcentajes más altos de poliéster o algodón virgen.') }}
            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cómo ordeno las tallas en mi caja de 72 pz?') }}
            </h2>
            <p class="gelion-thin">{{ __('Elige tus tallas desde la S hasta la XL en fit de dama y de S hasta 2XL en fit de caballero, en múltiplos de 6, esto significa que puedes elegir, por ejemplo: 18 talla S (en el color y fit que hayas seleccionado para esas 18 playeras), 24 talla M, 6 talla L y así sucesivamente hasta completar tu caja con 72 prendas. Recuerda que puedes elegir tallas, colores y el fit que más te guste.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cuántos colores puedo elegir por caja?') }}
            </h2>
            <p class="gelion-thin">{{ __('Dependiendo del plan que elijas puedes escoger entre 2 a 6 colores. Para el plan Start (1 caja de 72 camisetas) puedes elegir entre 2 colores, tallas de la S hasta la 2XL y los dos estilos de fit: dama y caballero. Para el plan Plus (de 2 a 3 cajas - 144 a 216 camisetas) puedes elegir entre 4 colores, tallas de la S hasta la 2XL y los dos estilos de fit: dama y caballero. Para el plan Top (de 4 cajas en adelante - 288 camisetas en adelante) puedes elegir entre 6 colores, tallas de la S hasta la 2XL y los dos estilos de fit: dama y caballero.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Qué diferencias existen entre el fit de caballero y el fit de dama?') }}
            </h2>
            <p class="gelion-thin">{{ __('Aunque ambas manejan un corte regular con cuello redondo, el fit de dama cuenta con la manga más corta y acinturada. El fit de hombre es más de estilo unisex, con mangas amplias, corte recto. Puedes consultar las medidas exactas en pulgadas de cada una de las partes de la prenda Rewear en nuestro catálogo digital.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Qué es el algodón reciclado y por qué es importante?') }}
            </h2>
            <p class="gelion-thin">{{ __('El algodón reciclado utilizado en las playeras Rewear es pre-consumo y proviene del desperdicio textil que resulta de las mesas de corte en la confección de prendas para otras marcas internacionales de diferentes maquiladoras en México y Estados Unidos. Este desperdicio textil pre-consumo pasa por varios procesos industriales para regresarlo a su composición original y así poder ser reutilizado en nuestras camisetas de alta calidad. Con la utilización de algodón reciclado fomentamos el movimiento de cero desperdicios y una economía circular en la industria textil.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cómo se utilizan las botellas de plástico recicladas (PET) en las playeras?') }}
            </h2>
            <p class="gelion-thin">{{ __('Para la creación del hilo con el que se teje la tela de cada playera Rewear se utilizan fibras de algodón reciclado y poliéster reciclado. Contamos con un proveedor certificado por Global Recycled Standard que garantiza la trazabilidad y sustentabilidad de las fibras de poliéster utilizadas, mismas que se obtienen de la transformación de botellas de plástico RPET que se recuperan de recicladoras especializadas en China.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Por qué el blanco tiene un tono azulado?') }}
            </h2>
            <p class="gelion-thin">{{ __('El tono azulado en nuestras camisetas blancas es debido a la naturaleza de la misma composición 50% algodón reciclado y 50% poliéster reciclado, debido a que la fibra de poliéster reciclado adquiere ese tono luego de su proceso de transformación y reciclaje.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Por qué son importantes las certificaciones?') }}
            </h2>
            <p class="gelion-thin">{{ __('Las certificaciones que nos brinda nuestro proveedor de hilo, tela y prenda son importantes porque con eso garantizamos que cada playera ha pasado por un proceso sustentable, reciclando algodón y utilizando solo 2 litros de agua desde su creación hasta su confección, sin teñir, utilizar químicos o dañar el medio ambiente. Estas certificaciones son: Global Recycled Standard y Higg Index emitido por la Sustainable Apparel Coalition además de que nuestro proveedor es miembro de Textile Exchange y Aware. Para más información sobre dichas certificaciones, por favor ponte en contacto con uno de nuestros asesores y con gusto aclaramos todas tus dudas.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cuál es el tiempo de vida de una prenda Rewear?') }}
            </h2>
            <p class="gelion-thin">{{ __('Nuestras prendas están creadas para garantizar un tiempo de vida largo: aproximadamente de 60 a 90 lavadas sin perder su forma y calidad con los cuidados y recomendaciones sugeridas. Esto lo pusimos en marcha con el fin de que tus prendas Rewear generen un mayor impacto y valor agregado en tu marca y luchemos juntos contra el fast fashion que genera prendas desechables y de mala calidad.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Qué diferencia hay entre el algodón orgánico y el algodón reciclado?') }}
            </h2>
            <p class="gelion-thin">{{ __('El algodón orgánico es una alternativa que propone el cultivo de algodón sin utilizar químicos o pesticidas para aumentar la producción. Por el contrario, el algodón reciclado no propone cultivar más y continuar con la utilización de agua y dañando el suelo, sino que reutiliza el algodón pre-consumo ya existente para regresarlo a su composición original y crear nuevamente textiles de alta calidad. En Rewear reutilizamos, no creamos nuevo algodón.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Puedo crear mi marca de ropa desde cero directamente con Rewear?') }}
            </h2>
            <p class="gelion-thin">{{ __('¡Claro! Nuestros planes están adecuados para que puedas elegir entre colores, tallas y fit para armar tu marca y ayudar a cambiar la industria de la moda con prendas sustentables. Si quieres saber más opciones que podemos ofrecerte para el desarrollo de tu marca, por favor contacta a uno de nuestros asesores y con gusto te apoyaremos.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Qué beneficios le trae a mi marca utilizar prendas Rewear?') }}
            </h2>
            <p class="gelion-thin">{{ __('Cuidar al planeta está de moda y hoy más que nunca, no es una tendencia, sino es una necesidad. Utilizar prendas sustentables hace que tu marca se una al grupo de empresas conscientes que quieren hacer un cambio favorable por el planeta, genera un mayor valor agregado a tus diseños y transmite el mensaje de cuidado a nuevas generaciones. El futuro de la moda lo hacemos todos los días con marcas que se suman a la sustentabilidad.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Con qué etiquetas viene la playera Rewear?') }}
            </h2>
            <p class="gelion-thin">{{ __('Nuestras camisetas Rewear vienen sin ningún distintivo visible de nuestra marca, esto con el fin de que puedas colocar logos, etiquetas y diseños de tu propia marca con facilidad. Para fines de descripción del producto y exportación, las camisetas Rewear cuentan únicamente con dos etiquetas interiores no visibles en el costado izquierdo: una con nuestro nombre y otra que menciona los cuidados de lavado y composición. Ambas etiquetas se pueden remover con facilidad para el uso que le quieras dar a nuestras camisetas.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cuántos estilos hay de playeras?') }}
            </h2>
            <p class="gelion-thin">{{ __('Actualmente contamos con un estilo de playera de corte regular con composición 50% algodón reciclado y 50% poliéster reciclado pero muy pronto estaremos incluyendo nuevos modelos y nuevas composiciones orgánicas y sustentables para que tu marca destaque de todas las demás.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Las playeras Rewear encogen?') }}
            </h2>
            <p class="gelion-thin">{{ __('Gracias a su composición de algodón y poliéster reciclado, logramos que el encogimiento de las prendas sea mínimo, un 5% más y un 5% menos de las medidas originales. Trabajar con fibras sustentables es un gran reto porque requiere mucha experimentación y procesos para lograr la perfección de la prenda que tendrás próximamente en tus manos.') }}

            </p>
        </div>
        <div class="faq">
            <h2 class="gelion-bold">
                 {{ __('¿Cuánto tardan en llegar mis playeras Rewear?') }}
            </h2>
            <p class="gelion-thin">{{ __('De 8 a 15 días aproximadamente a través de paquetería. Estamos orgullosos de poder llegar a todo México y Estados Unidos. Solo necesitamos unos cuántos datos para completar tu pedido y muy pronto tendrás tus cajas de playeras en la dirección que nos especifiques. Estamos ansiosos de poder trabajar contigo.') }}

            </p>
        </div>
    </div>
</section>
@endsection
