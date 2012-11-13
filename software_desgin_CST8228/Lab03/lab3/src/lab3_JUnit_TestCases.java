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
	lab3 labtree = new lab3();
   	
	/**
	 * @throws java.lang.Exception
	 */
	@Before
	public void setUp() throws Exception {
		lab3.main(null);
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
	public void testCalc_StackAddition() {
		//lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(0,0 , ' ', 40, 10000);
		assertEquals(820, lab3.answer);
	}
	
	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_StackSubtraction() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(1,0,' ', 40, 10000);
		assertEquals(820, lab3.answer);
	}
	
	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_ReverseLowercase() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(0, 0, ' ', num, stackSize);
		assertEquals(820, lab3.answer);
	}
	
	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_ReverseUppercase() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(0, 0, 'a', num, stackSize);
		assertEquals(820, lab3.answer);
	}

	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_PeekSpace() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(0, 1,' ', num, stackSize);
		assertEquals(820, lab3.answer);
	}

	
	/**
	 * Test method for {@link lab3#calc_output(int, int, char, int, int)}.
	 */
	@Test
	public void testCalc_PeekOther() {
		//assertEquals(-1, lab3.calc_output(stkOpr,strOpr,peekOpr,num, stackSize);
		lab3.calc_output(0, 1,'a', num, stackSize);
		assertEquals(820, lab3.answer);
	}


}
