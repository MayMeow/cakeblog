<channel>
    <title>Blog Posts</title>
    <link><?= $this->Url->build('/', ['fullBase' => true]) ?></link>
    <description>Recent posts</description>
    <language>en-us</language>
    <?php foreach ($posts as $post): ?>
    <item>
        <title><?= h($post->title) ?></title>
        <link><?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id], ['fullBase' => true]) ?></link>
        <description><?= h(strip_tags($this->Text->truncate($post->body_html, 400))) ?></description>
        <content:encoded><![CDATA[<?= $post->body_html ?>]]></content:encoded>
        <pubDate><?= $post->created->format(DATE_RSS) ?></pubDate>
        <guid><?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id], ['fullBase' => true]) ?></guid>
    </item>
    <?php endforeach; ?>
</channel>
