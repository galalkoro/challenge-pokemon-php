

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pokemon php</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// POKEMON IN GENERAL
$pokemon_name = '';
$pokemon_id = '';
$pokemon_image = '';
$pokemon_moves = '';
$pokemon_type = '';

if ($_GET['term'] ?? '') {
    $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["term"];
    $pokemonData = file_get_contents($url);
    $pokemonResults = json_decode($pokemonData, true);

    $pokemon_name = $pokemonResults['name'];
    $pokemon_id = $pokemonResults['id'];
    $pokemon_image = $pokemonResults['sprites']['other']['dream_world']['front_default'];
    $pokemon_moves = array_slice($pokemonResults['moves'], 0, 4);
    $pokemon_move0 = $pokemon_moves[0]['move']['name'];
    $pokemon_move1 = $pokemon_moves[1]['move']['name'];
    $pokemon_move2 = $pokemon_moves[2]['move']['name'];
    $pokemon_move3 = $pokemon_moves[3]['move']['name'];
    $pokemon_type = $pokemonResults['types'][0]['type']['name'];

}
// POKEMON ABILITIES
$pokemon_abilities = '';

if ($_GET['term'] ?? '') {
    $ability_url = "https://pokeapi.co/api/v2/ability/" . $_GET["term"];
    $abilityData = file_get_contents($ability_url);
    $abilityResults = json_decode($abilityData, true);

    $pokemon_abilities = $abilityResults['effect_entries'][1]['effect'];

}

// POKEMON EVOLUTION
$pokemon_evolution = '';

if ($_GET['term'] ?? '') {
    $evo_url = "https://pokeapi.co/api/v2/pokemon-species/" . $_GET["term"];
    $evoData = file_get_contents($evo_url);
    $evoResults = json_decode($evoData, true);

    $pokemon_evolution = $evoResults['evolves_from_species']['name'];
}

?>

<form>
    <label for="inputPoke">Pokémon ID or name</label><br>
    <input type="text" id="inputPoke" name="term">
    <button type="submit" id="searchPoke"> Search </button>
</form>

<div class="leftSide">
    <div class="row">
        <div class="column">
            <!-- <div class="pokeSprite"><span id="pokeSprite"></span> -->
            <div class="pokeSprite">
                <img src='<?php echo $pokemon_image ?>' id="pokeSprite">
        </div>
        </div>
    </div>
</div>

<div class="rightSide">
    <div class="row">
        <div class="column">
            <div class="pokeName">
                <p>Name: Name: <?php echo ucwords($pokemon_name) ?> 
                <span id="pokeName"></span><br/>
            </p>
            </div>
            <div class="pokeID">
                <p>ID: <?php echo $pokemon_id ?>
            <span id="pokeID"></span><br/>
        </p>
                <div class="pokeEvo">

                    <p>Evolution: <?php
                        if ($pokemon_evolution == false) {
                            echo "This pokemon did not evolve.";
                        } else {
                            echo ucfirst($pokemon_evolution = $evoResults['evolves_from_species']['name']);
                        } ?>
                        <span id="pokeEvo"></span><br/>
                        </p>

                    <div class="pokeAbilities">
                        <p>Abilities: <?php
                            if ($pokemon_abilities == false) {
                                echo "No abilities available.";
                            } else {
                                echo ucfirst($pokemon_abilities = $abilityResults['effect_entries'][1]['effect']);
                            } ?>

                            <span id="pokeAbilities"></span><br/>
                        </p>

                        <div class="pokeMove1">
                            <p>Move 1: 
                                <?php echo $pokemon_move0 = $pokemon_moves[0]['move']['name'] ?>
                             <span id="pokeMove1"></span><br/>
                        </p>
                </div>

                <div class="pokeMove2">
                    <p>Move 2: 
                        <?php echo $pokemon_move0 = $pokemon_moves[1]['move']['name'] ?> 
                    <span id="pokeMove2"> </span><br/>
                </p>
                </div>

                <div class="pokeMove3"><p>Move 3:
                     <?php echo $pokemon_move0 = $pokemon_moves[2]['move']['name'] ?>
                      <span id="pokeMove3"></span><br/>
                    </p>
                </div>

                <div class="pokeMove4">
                    <p>Move 4: 
                        <?php echo $pokemon_move0 = $pokemon_moves[3]['move']['name'] ?> 
                    <span id="pokeMove4"></span><br/>
                </p>
                </div>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
