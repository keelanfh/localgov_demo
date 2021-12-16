<?php

namespace Drupal\Tests\localgov_demo\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the demo content.
 *
 * @group localgov_demo
 */
class ContentTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'localgov_scarfolk';

  /**
   * {@inheritdoc}
   */
  protected $profile = 'localgov';

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'localgov_demo',
  ];

  /**
   * Test default content.
   */
  public function testPageContent() {

    // Test Service landing page: Adult health and social care.
    $this->drupalGet('/adult-health-and-social-care');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Adult health and social care');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block p', 'Advice and support for adult health and social care');
    $this->assertSession()->elementTextContains('css', '.block-localgov-service-cta-block nav', 'Find out about meals on wheels');
    $this->assertSession()->elementTextContains('css', '.block-localgov-service-cta-block nav', 'Step by step page');
    $this->assertSession()->elementTextContains('css', '.block-localgov-service-cta-block nav', 'Find out about occupational therapy');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page h3', 'Support in your home');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page p', 'Support and equipment to help you live independently and safely.');
    $this->assertSession()->elementTextContains('css', 'main .service-statuses h2', 'Service updates');
    $this->assertSession()->elementTextContains('css', 'main .service-status h3', 'Adult social care service is working normally');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact h2', 'Contact this service');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact', 'Send us a message');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact', '555 111 222 333');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact', 'Opening times');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact-container .field--name-localgov-address-first-line', 'Agile Collective');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__contact', 'If you have hearing or speech difficulties, please call 555 111 222 333');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__sidebar', 'Popular topics');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__sidebar', 'Garden waste');
    $this->assertSession()->elementTextContains('css', 'main .service-landing-page__sidebar', 'Parks and gardens');

    // Test Service sub-landing page: Another service landing page.
    $this->drupalGet('/adult-health-and-social-care/another-service-landing-page');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Another service landing page');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block p', 'Morbi porta tortor ac felis placerat, nec sodales justo tincidunt.');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'Child pages');
    $this->assertSession()->elementTextContains('css', 'main article', 'Example external link');

    // Test Service page: Occupational Therapy and equipment.
    $this->drupalGet('/adult-health-and-social-care/support-your-home/occupational-therapy-and-equipment-helping-you-stay');
    $this->assertSession()->elementTextContains('css', '.block-system-breadcrumb-block', 'Adult health and social care');
    $this->assertSession()->elementTextContains('css', '.block-system-breadcrumb-block', 'Support in your home');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Occupational Therapy and equipment: helping you stay at home');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block p', 'We provide advice and support to help you live independently if you\'re older, disabled, or have a long-term illness.');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'Choosing the right everyday equipment and adaptations');
    $this->assertSession()->elementTextContains('css', 'main article p', 'To help you stay at home, you can:');

    // Test Service statuses.
    $this->drupalGet('/service-status');
    $this->assertSession()->elementTextContains('css', 'h1', 'Council service updates');
    $this->assertSession()->elementTextContains('css', '.view-header p', 'We will keep this page updated with all the latest changes to our services.');
    $this->assertSession()->elementTextContains('css', '.service-status h2', 'Registry office is closed until further notice');

    // Test Service status: Adult social care service is working normally.
    $this->drupalGet('/adult-health-and-social-care/status/adult-social-care-service-working-normally');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Adult social care service is working normally');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block', 'fine now, nothing to see here');
    $this->assertSession()->elementTextContains('css', 'main article p', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

    // Test Guide overview page: Blue badges.
    $this->drupalGet('/adult-health-and-social-care/travel-passes-and-support/blue-badges');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Blue Badges');
    $this->assertSession()->elementTextContains('css', '.lgd-guide-nav', 'About Blue Badges');
    $this->assertSession()->elementTextContains('css', '.lgd-guide-nav', 'Blue Badges for organisations');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'Overview');
    $this->assertSession()->elementTextContains('css', 'main article p', 'Blue Badges give disabled people who rely on car travel, but face challenges in getting from the car to their destination, the ability to park close-by.');
    $this->assertSession()->elementTextContains('css', '.lgd-prev-next a', 'Next');

    // // Test Guide page: Apply for a blue badge.
    // $this->drupalGet('/adult-health-and-social-care/travel-passes-and-support/blue-badges/apply-blue-badge');
    $this->clicklink('Apply for a Blue Badge');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Blue Badges');
    $this->assertSession()->elementTextContains('css', '.lgd-guide-nav', 'About Blue Badges');
    $this->assertSession()->elementTextContains('css', '.lgd-guide-nav', 'Blue Badges for organisations');
    $this->assertSession()->elementTextContains('css', '.lgd-guide-nav', 'Apply for a Blue Badge');
    $this->assertSession()->elementTextContains('css', 'main article .callout-primary', 'Apply for a Blue Badge on GOV.UK');
    $this->assertSession()->elementTextContains('css', 'main article .alert-danger', 'Do not use unofficial sites which charge a fee for applying.');
    $this->assertSession()->elementTextContains('css', '.lgd-prev-next a', 'Previous');
    $this->assertSession()->elementTextContains('css', '.lgd-prev-next .lgd-prev-next__link--next', 'Next');

    // Test Step by step overview page: Request support for an adult.
    $this->drupalGet('/adult-health-and-social-care/step-by-step/request-support-adult-step-step');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Request support for an adult: step by step');
    $this->assertSession()->elementTextContains('css', 'main article .alert-info', 'Appointments with adult social care staff are now happening on the telephone.');
    $this->assertSession()->elementTextContains('css', 'main article .callout-danger', 'For urgent help');
    $this->assertSession()->elementTextContains('css', '.step-list', 'Find out what support we offer');
    $this->assertSession()->elementTextContains('css', '.step-list', 'Contact the support team');
    $this->assertSession()->elementTextContains('css', '.step-list', 'Apply for financial support');
    $this->assertSession()->elementTextContains('css', '.step-list', 'Choosing how to manage your care');

    // Test Step by step page: Find out what support we offer.
    $this->drupalGet('/adult-health-and-social-care/step-by-step/request-support-adult-step-step/find-out-what-support-we');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Find out what support we offer');
    $this->assertSession()->elementTextContains('css', '.step-by-step-pages__relationship', 'Request support for an adult: step by step');
    $this->assertSession()->elementTextContains('css', '.lgd-prev-next', 'Next step');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'What we can help with');
    $this->assertSession()->elementTextContains('css', 'aside .step-list', 'Find out what support we offer');
    $this->assertSession()->elementTextContains('css', 'aside .step-list', 'See what social care is available, including:');
    $this->assertSession()->elementTextContains('css', 'aside .step-list', 'Contact the support team');
    $this->assertSession()->elementTextContains('css', 'aside .step-list', 'Apply for financial support');
    $this->assertSession()->elementTextContains('css', 'aside .step-list', 'Choosing how to manage your care');

    // Test Event page: LocalGovDrupal Product Group meetup.
    $this->drupalGet('/events/localgovdrupal-product-group-meetup');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'LocalGovDrupal Product Group meetup');
    $this->assertSession()->elementTextContains('css', 'main', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.');

    // Test Subsite overview: A test subsite to demo all the components.
    $this->drupalGet('/test-subsite-demo-all-components');
    $this->assertSession()->elementTextContains('css', 'main article .paragraph--type--localgov-media-with-text h2', 'Test');
    $this->assertSession()->elementTextContains('css', 'main article .paragraph--type--localgov-media-with-text', 'Nulla porttitor accumsan tincidunt.');
    $this->assertSession()->elementTextContains('css', 'main article .paragraph--type--localgov-media-with-text', 'Donec sollicitudin molestie malesuada.');

    // Test Subsite page: Example page with a table.
    $this->drupalGet('/test-subsite-demo-all-components/example-page-tables-and-tabs');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'Example page with tables and tabs');
    $this->assertSession()->elementTextContains('css', 'main article .paragraph--type--localgov-table caption', 'This is a minimal table');
    $this->assertSession()->elementTextContains('css', 'main article', 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.');
    $this->assertSession()->elementTextContains('css', 'main article', 'Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.');
    $this->assertSession()->elementTextContains('css', 'main article .paragraph--type--localgov-tabs', 'This is some example tabs');

    // Test Subsite page: Example page with a video.
    $this->drupalGet('/test-subsite-demo-all-components/video-page');
    $this->assertSession()->elementTextContains('css', 'main article h2', 'A video page');

    // Test Directory venue: LocalGov Drupal Collaborators.
    $this->drupalGet('/localgov-drupal-collaborators');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'LocalGov Drupal Collaborators');
    $this->assertSession()->elementTextContains('css', 'main', 'Explore the contributors and adopters in this directory.');

    // Test Directory venue: Agile Collective.
    $this->drupalGet('/localgov-drupal-collaborators/agile-collective');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Agile Collective');
    $this->assertSession()->elementTextContains('css', 'main article', 'Agile Collective is a worker-owned agency that designs, builds and supports websites for purpose-driven organisations.');
    $this->assertSession()->elementTextContains('css', 'main article', 'Oxford');

    // Test Directory page: Citizens Advice.
    $this->drupalGet('adult-health-and-social-care/money-employment-and-training-directory/citizens-advice');
    $this->assertSession()->elementTextContains('css', '.lgd-page-title-block h1', 'Citizens Advice');
    $this->assertSession()->elementTextContains('css', 'main article', 'Help and advice on a range of issues, including:');
    $this->assertSession()->elementTextContains('css', 'main article', '0800 144 8848');
  }

}
