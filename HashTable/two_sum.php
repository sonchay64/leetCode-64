

<?php 

/*

@solution at https://leetcode.com/problems/two-sum/submissions/1139643365

################## The Two Sum ############################

Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.

 

Example 1:

Input: nums = [2,7,11,15], target = 9
Output: [0,1]
Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].
Example 2:

Input: nums = [3,2,4], target = 6
Output: [1,2]
Example 3:

Input: nums = [3,3], target = 6
Output: [0,1]
 

Constraints:

2 <= nums.length <= 104
-109 <= nums[i] <= 109
-109 <= target <= 109
Only one valid answer exists.
 

Follow-up: Can you come up with an algorithm that is less than O(n2) time complexity?

*/
class Solution {

  //https://leetcode.com/problems/two-sum/submissions/1139643365
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {

        $length = count($nums);
        $sum_arr_index = array();
        $is_inner_loop_break = false;

        for($i=0;$i<$length;$i++)
        {
            for($j=0;$j<$length;$j++)
            {
                if($i == $j)
                {
                    continue;
                }

                 $first = $nums[$i];
                 $second = $nums[$j];

                if(($first+$second) == $target)
                {
                    $first_index = $i;
                    $second_index = $j;
                    unset($nums[$i]);
                    unset($nums[$j]);

                    array_push($sum_arr_index,$first_index,$second_index);
                    $is_inner_loop_break=true;
                    break;
                }
            }

            if($is_inner_loop_break){break;}
           
        }

        return $sum_arr_index;
    }
}

$sol = new Solution();
$nums = [2,7,11,15];
$target = 9;

var_export($sol->twoSum($nums,$target));
?>
