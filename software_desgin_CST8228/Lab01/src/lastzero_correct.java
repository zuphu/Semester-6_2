class lastzero_correct
{
	public static int lastzero_correct (int[] x)
		{  
			if (x.length == 0)
			{
				System.out.println ("Usage: java lastZero v1 [v2] [v3] ... ");
				return -1;
			}
			
			if (x.length >= 100000)
			{
				System.out.println("Too many inputs! Max number of inputs is: 100000");
				return -1;
			}
			// Effects: if x==null throw NullPointerException 
			//   else return the index of the LAST 0 in x.
			//   Return -1 if 0 does not occur in x 

			for (int i = x.length - 1; i > -1; i--)
			{
				if (x[i] == 0)
				{
					return i;
				}
			}
			return -1;
		}
}
