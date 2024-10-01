<?php 
# Available @ https://leetcode.com/problems/median-of-two-sorted-arrays/submissions/1407975353/
/*
Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.

The overall run time complexity should be O(log (m+n)).

Example 1:

Input: nums1 = [1,3], nums2 = [2]
Output: 2.00000
Explanation: merged array = [1,2,3] and median is 2.
Example 2:

Input: nums1 = [1,2], nums2 = [3,4]
Output: 2.50000
Explanation: merged array = [1,2,3,4] and median is (2 + 3) / 2 = 2.5.
 

Constraints:

nums1.length == m
nums2.length == n
0 <= m <= 1000
0 <= n <= 1000
1 <= m + n <= 2000
-106 <= nums1[i], nums2[i] <= 106

*/

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        
        $merged_array = array_merge($nums1, $nums2);
        
        $total_item = count($merged_array);
        sort($merged_array);

        /*
          # The median formula #

        For Odd => Median = [(n + 1)/2] th term

        For Even => Median = [(n/2) th term + (n/2 + 1) th term]/2

        where “n” is the number of items in the set and “th” just means the (n)th number.
        
        Applying the Formula: 
            
            Let's use an example array with 4 elements: [1, 2, 3, 4].

            Total Number of Elements: n = 4

            (n/2)=> 
                    1.For ( n = 4 ), ((4/2) = 2). This means the 2nd term in the list.
                    2.In zero-indexed arrays, the 2nd term is at index ( 2 - 1 = 1 ).

            (n/2 + 1)=>
                    1. For ( n = 4 ), ((4/2) + 1 = 3). This means the 3rd term in the list.
                    2.In zero-indexed arrays, the 3rd term is at index ( 3 - 1 = 2 ).

            For the array [1, 2, 3, 4]
                    
                    1.((n/2) = 2): The 2nd term is 2, which is at index 1.
                    2.((n/2) + 1 = 3): The 3rd term is 3, which is at index 2.

                So, the median calculation in zero-indexed terms is:

                        Indices: 1 and 2
                        Values: 2 and 3
                        Median: ((2 + 3)/2 = 2.5)

        */

	    if ($total_item % 2 == 0) {
	        // If even, average the two middle numbers
	        $median = ($merged_array[$total_item / 2 - 1] + $merged_array[$total_item / 2]) / 2;
	    } else {
	        // If odd, take the middle number
	        $median = $merged_array[floor($total_item / 2)];
	    }

        $res = $median;
        return $res;
    }
}

$code = new Solution();

$nums1 = [1,3];
$nums2 = [2];

//$nums1 = [1,2];
//$nums2 = [3,4];

//$nums1 = [0,0];
//$nums2 = [0,0];

$output = $code->findMedianSortedArrays($nums1,$nums2);

echo $output;
