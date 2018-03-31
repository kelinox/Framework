<?= $renderer->render('header') ?>

<h1>Bienvenue sur le blog</h1>

<ul>
    <li><a href="<?= $router->generateUri('blog.show', ['slug' => 'azeaze-0']); ?>">Article 1</a></li>
    <li>Article</li>
    <li>Article</li>
    <li>Article</li>
    <li>Article</li>
    <li>Article</li>
    <li>Article</li>
</ul>

<?= $renderer->render('footer') ?>
