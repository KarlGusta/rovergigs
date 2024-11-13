<?php
// meta-tags.php
class MetaTags {
    private $defaultMeta = [
        'title' => 'Rails Hub',
        'description' => 'A Rails Hub reverse job board.',
        'image' => 'assets/images/default_meta_image.png'
    ];
    
    private $baseUrl;
    
    public function __construct() {
        $this->baseUrl = 'https://' . $_SERVER['HTTP_HOST'];
    }
    
    public function getMetaInfo($pageId) {
        // This could be replaced with actual database queries or CMS logic
        $pages = [
            'home' => [
                'title' => 'Rails Hub - Home',
                'description' => 'A Rails Devs community.',
                'image' => 'assets/images/default_meta_image.png'
            ],
            'more-devs' => [
                'title' => 'Rails Hub - More Developers',
                'description' => 'More developers on Rais Hub.',
                'image' => 'assets/images/apply_meta_image.png'
            ]
        ];
        
        return $pages[$pageId] ?? null;
    }
    
    public function generateMetaTags($pageId) {
        $metaInfo = $this->getMetaInfo($pageId);
        $meta = $metaInfo ?? $this->defaultMeta;
        
        // Ensure image URL is absolute
        $imageUrl = strpos($meta['image'], 'http') === 0 
            ? $meta['image'] 
            : $this->baseUrl . $meta['image'];
            
        ob_start();
        ?>
        <!-- Basic Meta Tags -->
        <title><?php echo htmlspecialchars($meta['title']); ?></title>
        <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo $this->baseUrl . $_SERVER['REQUEST_URI']; ?>">
        <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
        <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
        <meta property="og:image" content="<?php echo htmlspecialchars($imageUrl); ?>">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?php echo $this->baseUrl . $_SERVER['REQUEST_URI']; ?>">
        <meta property="twitter:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
        <meta property="twitter:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
        <meta property="twitter:image" content="<?php echo htmlspecialchars($imageUrl); ?>">
        <?php
        return ob_get_clean();
    }
}