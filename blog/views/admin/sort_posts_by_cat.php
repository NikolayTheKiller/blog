

<p>Все статьи в категории <strong><?php echo $categoryById['name']; ?></strong>:</p>

<table>
    <tr>
        <th>название статьи|</th>      
    </tr>
     <?php foreach ($sort as $post_cat): ?>
    <tr>
        <td><?php echo $post_cat['name']; ?></td>      
    </tr>
     <?php endforeach; ?>
</table>
<hr>
<a href="/adminpost/index" style="border: 2px solid blue; padding: 3px">Назад</a>
