import static org.junit.Assert.*;
import junit.framework.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class Testlastzero extends TestCase {

	@Before
	public void setUp() throws Exception {
	}

	@After
	public void tearDown() throws Exception {
	}
	
	//DEFECT
	@Test
	public void testLastzero_defect_noargs() //no arguments
	{
		assertEquals(-1, lastZero.lastzero_defect(new int[] {})); 
	}
	
	@Test
	public void testLastzero_defect_maxinputs() {
		assertEquals(-1, lastZero.lastzero_defect(new int[100000])); //too many arguments
	}
	
	@Test
	public void testLastzero_defect_nozero() {
		assertEquals(-1, lastZero.lastzero_defect(new int[] {1, 1, 1})); //no zeros		
	}
	
	@Test
	public void testLastzero_defect_oneinput() {
		assertEquals(0, lastZero.lastzero_defect(new int[] {0})); //one input
	}
	
	@Test
	public void testLastzero_defect_onezero() {
		assertEquals(2, lastZero.lastzero_defect(new int[] {1, 1, 0})); //one zero	
	}
	
	public void testLastzero_defect_multiplezero()
	{
		assertEquals(2, lastZero.lastzero_defect(new int[] {0, 1, 0})); //multiple zeroes
	}
	
	//CORRECT
	@Test
	public void testLastzero_correct_noargs() //no arguments
	{
		assertEquals(-1, lastZero.lastzero_correct(new int[] {})); 
	}
	
	@Test
	public void testLastzero_correct_maxinputs() {
		assertEquals(-1, lastZero.lastzero_correct(new int[100000])); //too many arguments
	}
	
	@Test
	public void testLastzero_correct_nozero() {
		assertEquals(-1, lastZero.lastzero_correct(new int[] {1, 1, 1})); //no zeros		
	}
	
	@Test
	public void testLastzero_correct_oneinput() {
		assertEquals(0, lastZero.lastzero_correct(new int[] {0})); //one input
	}
	
	@Test
	public void testLastzero_correct_onezero() {
		assertEquals(2, lastZero.lastzero_correct(new int[] {1, 1, 0})); //one zero	
	}
	
	public void testLastzero_correct_multiplezero()
	{
		assertEquals(2, lastZero.lastzero_correct(new int[] {0, 1, 0})); //multiple zeroes
	}

}
