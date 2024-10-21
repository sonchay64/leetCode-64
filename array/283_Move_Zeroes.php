<?php 

# Available @ https://leetcode.com/problems/move-zeroes/submissions/1429188423

/*
Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.

Note that you must do this in-place without making a copy of the array.

 

Example 1:

Input: nums = [0,1,0,3,12]
Output: [1,3,12,0,0]
Example 2:

Input: nums = [0]
Output: [0]
 

Constraints:

1 <= nums.length <= 104
-231 <= nums[i] <= 231 - 1
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
       $count = count($nums);
        $i=0;

        while($i<$count)
        {
            if($nums[$i] == '0')
            {
                unset($nums[$i]);
                $nums[]=0;
            }
            $i++;
        }

        return $nums;
    }
}

$code = new Solution();
$nums = [0,1,0,3,12];
$output = $code->moveZeroes($nums);
print_r($output);
