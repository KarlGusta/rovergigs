<?php
// config/paths.php
// To make it easy to manage my URLs when I upload to production, that is cpanel
class PathConfig {
    private static $instance = null;
    private $config;
    
    private function __construct() {
        // Base path configuration
        $this->config = [
            'development' => [
                'base_path' => '/rovergigs/railshub',
                'paths' => [
                    'home' => '/',
                    'users' => [
                        'sign_in' => '/users/sign-in.php',
                        'sign_up' => '/users/sign-up.php',
                        'logout' => '/users/logout.php'
                    ],
                    'developers' => [
                        'more' => '/developers/more-devs.php',
                        'hire' => '/developers/hire.php',
                        'new' => '/developers/new.php',
                        'avatar' => '/developers/'  // For avatar images
                    ],
                    'businesses' => [
                        'new' => '/businesses/new.php'
                    ],
                    'roles' => [
                        'new' => '/roles/new.php'
                    ],
                    'assets' => [
                        'images' => '/Images/',
                        'dist' => '/dist/'
                    ],
                    'pricing' => '/pricing.php'
                ]
            ],
            'production' => [
                'base_path' => 'https://www.rovergigs.com/railshub', // Update this with your production base path
                'paths' => [
                    // Same structure as development, but with production paths
                    'home' => '/',
                    'users' => [
                        'sign_in' => '/users/sign-in.php',
                        'sign_up' => '/users/sign-up.php',
                        'logout' => '/users/logout.php'
                    ],
                    'developers' => [
                        'more' => '/developers/more-devs.php',
                        'hire' => '/developers/hire.php',
                        'new' => '/developers/new.php',
                        'avatar' => '/developers/'  // For avatar images
                    ],
                    'businesses' => [
                        'new' => '/businesses/new.php'
                    ],
                    'roles' => [
                        'new' => '/roles/new.php'
                    ],
                    'assets' => [
                        'images' => '/Images/',
                        'dist' => '/dist/'
                    ],
                    'pricing' => '/pricing.php'
                ]
            ]
        ];
    }
    
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new PathConfig();
        }
        return self::$instance;
    }
    
    public function getPath($key, $subkey = null) {
        $environment = $this->getCurrentEnvironment();
        $base = $this->config[$environment]['base_path'];
        
        if ($subkey) {
            return $base . $this->config[$environment]['paths'][$key][$subkey];
        }
        
        return $base . $this->config[$environment]['paths'][$key];
    }
    
    private function getCurrentEnvironment() {
        // You can modify this logic based on your needs
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            return 'development';
        }
        return 'production';
    }
}

// Helper function for easy access
function path($key, $subkey = null) {
    return PathConfig::getInstance()->getPath($key, $subkey);
}