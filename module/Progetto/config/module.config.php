<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Progetto;

return array(
  'router' => array(
      'routes' => array(
          'progetti' => array(
              'type'    => 'Literal',
              'options' => array(
                  'route'    => '/progetto',
                  'defaults' => array(
                      'controller' => 'Progetto\Controller\Index',
                      'action'        => 'index',
                  ),
              ),
              'may_terminate' => true,
              'child_routes' => array(
                  'default' => array(
                      'type'    => 'Segment',
                      'options' => array(
                          'route'    => '/:codice',
                          'constraints' => array(
                              'codice' => '[a-zA-Z][a-zA-Z0-9_-]*',
                          ),
                          'defaults' => array(
                              'action' => 'progetto',
                          ),
                      ),
                  ),
              ),
          ),


      ),
  ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Progetto\Controller\Index' => Controller\IndexController::class
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity']
            ],
            'orm_default'             => [
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ],
        ],
    ],

    // ACL
    'bjyauthorize' => [
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [

                // Pagine fornite dal controller Index: accesso consentito a tutti
                //['controller' => 'Progetto\Controller\Admin', 'roles' => ['admin']],

                ['controller' => 'Progetto\Controller\Index', 'roles' => []],

            ],
        ],
    ],

    // navigation area admin
    'navigation' => array(
        'admin' => array(
            'Progetto' => array(
                'label' => 'Progetto',
                'route' => 'zfcadmin/Progetto',
            ),
        ),
    ),
  );
