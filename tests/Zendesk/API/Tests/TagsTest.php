<?php
// FINISH THIS!

namespace Zendesk\API\Tests;

use Zendesk\API\Client;

/**
 * Tags test class
 */
class TagsTest extends BasicTest {

    public function testCredentials() {
        parent::credentialsTest();
    }

    public function testAuthToken() {
        parent::authTokenTest();
    }

    /**
     * @depends testAuthToken
     */
    public function testCreate() {
        $tags = $this->client->ticket(1)->tags()->create(array('tags' => array('important')));
        $this->assertEquals(is_object($tags), true, 'Should return an object');
        $this->assertEquals(is_array($tags->tags), true, 'Should return an array called "tags"');
        $this->assertEquals(in_array('important', $tags->tags), true, 'Added tag does not exist');
        $this->assertEquals($this->client->getDebug()->lastResponseCode, '201', 'Does not return HTTP code 201');
    }

    /**
     * @depends testCreate
     */
    public function testAll() {
        $tags = $this->client->tags()->findAll();
        $this->assertEquals(is_object($tags), true, 'Should return an object');
        $this->assertEquals(is_array($tags->tags), true, 'Should return an array called "tags"');
        $this->assertEquals($this->client->getDebug()->lastResponseCode, '200', 'Does not return HTTP code 200');
    }

    /**
     * @depends testCreate
     */
    public function testUpdate() {
        $tags = $this->client->ticket(1)->tags()->update(array('tags' => array('customer')));
        $this->assertEquals(is_object($tags), true, 'Should return an object');
        $this->assertEquals(is_array($tags->tags), true, 'Should return an array called "tags"');
        $this->assertEquals(in_array('customer', $tags->tags), true, 'Added tag does not exist');
        $this->assertEquals($this->client->getDebug()->lastResponseCode, '200', 'Does not return HTTP code 200');
    }

    /**
     * @depends testCreate
     */
    public function testFind() {
        $tags = $this->client->ticket(1)->tags()->find();
        $this->assertEquals(is_object($tags), true, 'Should return an object');
        $this->assertEquals(is_array($tags->tags), true, 'Should return an array called "tags"');
        $this->assertEquals(in_array('customer', $tags->tags), true, 'Added tag does not exist');
        $this->assertEquals($this->client->getDebug()->lastResponseCode, '200', 'Does not return HTTP code 200');
    }

    /**
     * @depends testCreate
     */
    public function testDelete() {
        $tags = $this->client->ticket(1)->tags()->delete(array('tags' => array('customer')));
        $this->assertEquals(is_object($tags), true, 'Should return an object');
        $this->assertEquals(is_array($tags->tags), true, 'Should return an array called "tags"');
        $this->assertEquals(in_array('important', $tags->tags), true, 'Added tag does not exist');
        $this->assertEquals($this->client->getDebug()->lastResponseCode, '200', 'Does not return HTTP code 200');
    }

}

?>
