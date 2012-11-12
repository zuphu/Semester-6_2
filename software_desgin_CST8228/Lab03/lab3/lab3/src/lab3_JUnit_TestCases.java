import static org.junit.Assert.assertEquals;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

/**
 * @author zug
 *
 */
public class lab3_JUnit_TestCases {
	int num = 40;
	int stackSize = 10000;
   	int stkOpr = 0, strOpr=0;
   	char peekOpr=' ';    
   	
	/**
	 * @throws java.lang.Exception
	 */
	@Before
	public void setUp() throws Exception {
	}

	/**
	 * @throws java.lang.Exception
	 */
	@After
	public void tearDown() throws Exception {
	}

	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_output() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		assertEquals(1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize));
	}

}
