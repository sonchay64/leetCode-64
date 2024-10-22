<?php

# Available @ https://leetcode.com/problems/search-insert-position/submissions/1430268604

/*
Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.

 

Example 1:

Input: nums = [1,3,5,6], target = 5
Output: 2
Example 2:

Input: nums = [1,3,5,6], target = 2
Output: 1
Example 3:

Input: nums = [1,3,5,6], target = 7
Output: 4
 

Constraints:

1 <= nums.length <= 104
-104 <= nums[i] <= 104
nums contains distinct values sorted in ascending order.
-104 <= target <= 104

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */

    function searchInsert($nums, $target) {
        
        $limit = count($nums);
        $item_found_flag = false;
        $item_found_index = 0;

        for($i=0;$i<$limit;$i++)
        {
            if($nums[$i] === $target)
            {
                $item_found_flag=true;
                $item_found_index = $i;
                break;
            }
        }

        if($item_found_flag)
        {
            return $item_found_index;
        }
        else
        {
            $nums[$limit]=$target;
            sort($nums);
            $index_would_be = 0;

            foreach($nums as $key=>$val)
            {
                if($val == $target)
                {
                    $index_would_be = $key;
                    break;
                }
            }

            return $index_would_be;
        }

    }
}

$code = new Solution();
$nums = [1,3,5,6];
//$target = 5;
//$target = 2;
$target = 7;

$output = $code->searchInsert($nums,$target);
echo $output;
