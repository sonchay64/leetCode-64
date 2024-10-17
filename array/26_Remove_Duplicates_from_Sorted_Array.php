<?php 
# Available @ https://leetcode.com/problems/remove-duplicates-from-sorted-array/submissions/1425210416

/* ###### Without using Built-in Function #########

Approach

Input is sorted by ascending order, it means that we do not need additional array or loop for comparisons.
Steps:

nums = [0 => 1, 1 => 1, 2 => 2, 3 => 2] (with indexes)

1.Initialize two pointers - i=0, j=1

2.Iterate through until length of array is higher than j.

3.Compare element in index i with element in index j

4.If elements are same, delete element in index j and increment its value, after 1st iteration our values would be: nums = [0 => 1, 2 => 2, 3 => 2] and here we have hole in our array.
So in 2nd iteration we compare nums[0] with nums[2] and now condition is not true because elements are not the same 1 === 2.

5.If elements are not the same (else) we need to skip current element in index i and also skip hole in our array.
For this we can just take value from j and assign to i and increment value of j because we need to take next element. Now i=2, j=3 and array is still same nums = [0 => 1, 2 => 2, 3 => 2]

6.So in 3rd iteration we do same thing like in 4th step, after this our pointers would be i=2, j=4 and array is nums = [0 => 1, 2 => 2], as you can see our j is equal to the initial length of array - we do not iterate anymore.

Finally, removed duplicates from array without using additional array or loop.

Time complexity: O(n)

Space complexity: O(1)

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        // using built-in function
       // $nums = array_unique($nums);

        // without using built-in function
        $i=0;
        $j=1;
        $count = count($nums);

        while($j<$count)
        {
            if($nums[$i] === $nums[$j])
            {
                unset($nums[$j]);
                $j++;
            }
            else
            {
                $i=$j;
                $j++;
            }
        }
        return count($nums);
    }
}

$code = new Solution();

//$nums = [1,1,2];
$nums = [0,0,1,1,1,2,2,3,3,4];
$output = $code->removeDuplicates($nums);

echo $output;
