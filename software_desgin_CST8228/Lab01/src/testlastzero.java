





import static org.junit.Assert.*;
import junit.framework.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class testlastzero extends TestCase {

	@Before
	public void setUp() throws Exception {
	}

	@After
	public void tearDown() throws Exception {
	}

	@Test
	public void testLastzero_defect() {
		assertEquals(2 , lastZero.lastzero_defect(new int[] {0, 1, 0}));
	}

	@Test
	public void testLastzero_correct() {
		assertEquals(2 , lastZero.lastzero_correct(new int[] {0, 1, 0}));
	}

}
