<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
<?php
$country_info = array(
    'France' => array(
        'image' => 'france.jpg',
        'description' => 'La France est un pays situé en Europe. Sa capitale est Paris. La France est connue pour sa cuisine délicieuse, ses monuments emblématiques comme la Tour Eiffel et sa culture riche.',
    ),
    'Japon' => array(
        'image' => 'japan.png',
        'description' => 'Le Japon est un pays situé en Asie de l\'Est. Sa capitale est Tokyo. Le Japon est célèbre pour ses temples bouddhistes, sa cuisine traditionnelle comme les sushis et sa culture unique qui mêle tradition et modernité.',
    ),
    'Brésil' => array(
        'image' => 'brazil.jpg',
        'description' => 'Le Brésil est un pays situé en Amérique du Sud. Sa capitale est Brasília. Le Brésil est connu pour sa musique animée comme la samba, ses plages magnifiques et le carnaval de Rio de Janeiro.',
    ),
    'Maroc' => array(
        'image' => 'maroc.png',
        'description' => 'Le Maroc est un pays situé en Afrique du Nord. Sa capitale est Rabat. Le Maroc est célèbre pour ses souks colorés, sa cuisine délicieuse comme le couscous et le tajine, et ses magnifiques paysages désertiques.',
    ),
    'Royaume-Uni' => array(
        'image' => 'uk.png',
        'description' => 'Le Royaume-Uni est un pays composé de l\'Angleterre, de l\'Écosse, du Pays de Galles et de l\'Irlande du Nord. Sa capitale est Londres. Le Royaume-Uni est réputé pour ses sites historiques, ses traditions comme le thé de l\'après-midi et sa musique populaire.',
    ),
    'États-Unis' => array(
        'image' => 'usa.png',
        'description' => 'Les États-Unis sont un pays situé en Amérique du Nord. Sa capitale est Washington, D.C. Les États-Unis sont connus pour leur diversité culturelle, leurs gratte-ciels emblématiques comme l\'Empire State Building, et leur influence dans les domaines de la musique, du cinéma et de la technologie.',
    ),
    'Chine' => array(
        'image' => 'chine.jpg',
        'description' => 'La Chine est un pays situé en Asie de l\'Est. Sa capitale est Pékin. La Chine est célèbre pour sa Grande Muraille, sa cuisine variée comme les nouilles et les dim sum, et sa riche histoire et culture qui remontent à des milliers d\'années.',
    )
);

$selected_country = isset($_POST['country']) ? $_POST['country'] : null;

if ($selected_country && !empty($country_info[$selected_country])) {
    $country = $country_info[$selected_country];
    unset($country_info[$selected_country]);
}
?>

<div class="container">
    <h2>Apprenez sur différents pays et leurs cultures</h2>

    <?php if (isset($country)): ?>
        <h3><?php echo $selected_country; ?></h3>
        <img src="<?php echo $country['image']; ?>" alt="<?php echo $selected_country; ?>">
        <p><?php echo $country['description']; ?></p>

        <?php if (!empty($country_info)): ?>
            <form method="POST" action="">
                <label for="country">Sélectionnez un pays :</label>
                <select name="country" id="country">
                    <option value="">-- Choisissez un pays --</option>
                    <?php foreach ($country_info as $country => $info): ?>
                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Découvrir</button>
            </form>
        <?php else: ?>
            <p>Le test est terminé. Vous avez exploré tous les pays disponibles.</p>
        <?php endif; ?>

    <?php else: ?>
        <form method="POST" action="">
            <label for="country">Sélectionnez un pays :</label>
            <select name="country" id="country">
                <option value="">-- Choisissez un pays --</option>
                <?php foreach ($country_info as $country => $info): ?>
                    <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Découvrir</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>



