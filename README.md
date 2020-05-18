**Symfony version(s) affected**: confirmed on 4.4.4+, but possibly 4.1.1+ (see related issues in additional context)

**Description**  
Private non-shared services are removed from the test container.

IF private non-shared service `x` is injected into service `y` AND the service definition of `x` is replaced by a service reference through a compiler pass THEN the following error occurs in the test environment: `The service "y" has a dependency on a non-existent service "x".` 

**How to reproduce**  
* Check out [reproducer](url)
* Run `composer install`
* Run `bin/console ca:cl -e test`

The following error occurs: `The service "App\Twig\FooRuntime" has a dependency on a non-existent service "App\Services\FooService".`

This error only triggers in the test environment (dev and prod produce `[OK]`)

**IMPORTANT:** Note that `App\Twig\FooRuntime` goes through compiler pass `Symfony\Bundle\TwigBundle\DependencyInjection\Compiler\RuntimeLoaderPass`due to the class implementing `RuntimeExtensionInterface`. Either removing `implements RuntimeExtensionInterface` or deleting `App\Controller\DefaultController` resolves the issue.

**Possible Solution**  
Disabling `Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\TestServiceContainerWeakRefPass` resolves the issue; a solution might be found inside that class.

The following lines in `Symfony\Component\DependencyInjection\Compiler\InlineServiceDefinitionsPass` also seem related.
```
if (!$definition->isShared() && !$definition->isPublic()) {
    $container->removeDefinition($id);
}
```

**Additional context**  
Related issues:
* #27488
* #29628
