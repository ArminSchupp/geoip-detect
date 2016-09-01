
<?php


class GeonamesTest extends WP_UnitTestCase_GeoIP_Detect {
	
	public function testAllAttributesContainSomething() {
		$this->assertFileExists(GEOIP_DETECT_GEONAMES_COUNTRY_INFO);	
		$data = require(GEOIP_DETECT_GEONAMES_COUNTRY_INFO);
		
		$this->assertInternalType('array', $data);
		foreach ($data as $id => $country) {
			$record = new \YellowTree\GeoipDetect\DataSources\City($country, ['en']);
			$this->assertValidGeoIP2Record($record, 'Geonames Country Info of ' . $id, false /* Check continent: YES */, true /* Check Extra Info: NO */);
		}
	}
			
	
	
}