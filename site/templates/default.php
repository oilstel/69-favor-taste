<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>69 Favor Taste</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <?= css(['assets/css/main.css', '@auto']) ?>
        <?= css(['assets/css/font.css', '@auto']) ?>
        <link rel="shortcut icon" type="image/png" href="<?php foreach($site->files()->template('favicon') as $file): ?><?= $file->url() ?><?php endforeach ?>">

        <!-- Made on elliott.computer. A production of Bell Kiosk. January 2020. -->

        <script>
            const slideshowImages = [
            <?php $images = $site->files()->template('slideshow'); foreach($images as $image): ?>
                <?php if($image != $images->last()): ?>
                    `<?= $image->url() ?>`,
                <?php else: ?>
                    `<?= $image->url() ?>`
                <?php endif ?> 
            <?php endforeach ?>]
            const ingredients = [
            <?php $ingredients = $site->ingredients()->toStructure(); foreach ($ingredients as $ingredient): ?>
                <?php if($ingredient != $ingredients->last()): ?>
                    `<?= $ingredient->text() ?>`,
                <?php else: ?>
                    `<?= $ingredient->text() ?>`
                <?php endif ?> 
            <?php endforeach ?>
            ]
        </script>
    </head>
        
    <body>
        <div id="slideshow">
            <a href="#home" id="enter-button">Enter <span class="unicode" id="unicode-intro"></span> Favor Taste</a><br />
            <div id="img1"></div>
            <div id="img2"></div>
        </div>
    </div>   

        <div id="home">
            <div id="frame">
                    <header>
                        <div id="title">
                            <div class="unicode"></div><br />

                            <h1>69 Favor Taste</h1>
                    
                            <p><?= $site->description() ?></p>

                            <marquee scrollamount="5"><?= $site->ticker() ?></marquee>
                            
                            <div id="info">
                            <?php $items = $site->header_items()->toStructure(); foreach ($items as $item): ?>
                                <p><?= $item->text() ?></p>
                            <?php endforeach ?>
                            </div>
                        </div>
    
                        <div id="logo">
                            <img src="<?= url('assets/images/logo.svg') ?>" />
                        </div>
                    </header>
                    <main>
                        <div id="main-col">
                        <?php $episodes = $site->children()->not('home'); ?>
                        <?php foreach ($episodes as $episode) : ?>
                            <?php $position = $episodes->indexOf($episode) ?>

                            <section>
                                <h2><?= $episode->title() ?> <span id="episode-1-symbol"></span></h2>

                                <article>
                                    <?= $episode->description()->kt() ?>

                                    <p class="player">
                                        <span class="button" data-episode="episode-<?= $position ?>" onclick="play(this, this.dataset.episode);">Play</span>
                                        <span class="button" id="rewind" data-episode="episode-<?= $position ?>" onclick="rewind(this.dataset.episode);"></span>
                                        <audio controls id="episode-<?= $position ?>">
                                            <source src="<?php foreach($episode->files()->template('audio') as $file): ?><?= $file->url() ?><?php endforeach ?>" type="audio/mpeg">
                                        </audio> 
                                    </p>

                                    <div class="meta-links"><?php if ($episode->toggle_show_notes() == "true"): ?><span id="show-notes-button" data-target="show-notes-<?= $position ?>" onclick="toggleEl(this, this.dataset.target);">Show Notes</span><?php endif ?> <?php if ($episode->toggle_transcript() == "true"): ?><span id="transcript-button" data-target="transcript-<?= $position ?>" onclick="toggleEl(this, this.dataset.target);">Transcript</span></div><?php endif ?>

                                    <?php if ($episode->toggle_show_notes() == "true"): ?>
                                    <div id="show-notes-<?= $position ?>" class="meta-section" style="display: none;">
                                    <?= $episode->show_notes()->kt()  ?>
                                    </div>
                                    <?php endif ?>

                                    <?= $episode->index() ?>

                                    <?php if ($episode->toggle_transcript() == "true"): ?>
                                    <div id="transcript-<?= $position ?>" class="meta-section" style="display: none;">
                                        <?= $episode->transcript()->kt() ?>
                                    </div>
                                    <?php endif ?>
                                </article>
                            </section>
                        <?php endforeach ?>
                        </div>

                        <nav>
                            <div id="nav-inner">
                                    <h2>Subscribe</h2>
                                    <section>
                                        <ul>
                                        <?php $items = $site->subscribe()->toStructure(); foreach ($items as $item): ?>
                                            <li><a href="<?= $item->link() ?>"><?= $item->text() ?></a></li>
                                        <?php endforeach ?>
                                        </ul>
                                    </section>

                                    <!-- <h2>Support</h2>
                                    <section>
                                        <ul>
                                        <?php $items = $site->support()->toStructure(); foreach ($items as $item): ?>
                                            <li><a href="<?= $item->link() ?>"><?= $item->text() ?></a></li>
                                        <?php endforeach ?>
                                        </ul>
                                    </section> -->

                                    <h2>In The Pot</h2>
                                    <section id="recipe">
                                    </section>
                            </div>
                        </nav>
                        <div class="clear"></div>
                    </div>
            </main>
        </div>

        <div id="image-viewer">
            <div id="modal-inner">
                <img class="modal-content" id="image-full" />
                <div id="caption"></div>
            </div>
        </div>

        <?= js(['assets/js/jquery-3.4.1.min.js', '@auto']) ?>
        <?= js(['assets/js/main.js', '@auto']) ?>
    </body>
</html>