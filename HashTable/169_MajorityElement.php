<?php 
// @availble at https://leetcode.com/problems/majority-element/submissions/1143121834
/*
Given an array nums of size n, return the majority element.

The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.

 

Example 1:

Input: nums = [3,2,3]
Output: 3
Example 2:

Input: nums = [2,2,1,1,1,2,2]
Output: 2
 

Constraints:

n == nums.length
1 <= n <= 5 * 104
-109 <= nums[i] <= 109
 

Follow-up: Could you solve the problem in linear time and in O(1) space?
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
     //##### Using Built In Function #######

    /*function majorityElement($nums) {

        $arr_freq= max(array_flip(array_count_values($nums)));

        return $arr_freq;
    }*/

    //##### Without Using Built In Function #######

     function majorityElement($nums) {

        //find frequencies
        $freq_arr = array();

        //counting the frequencies of number
        foreach($nums as $n)
        {
            if(array_key_exists($n,$freq_arr))
            {
                $frequence_value = $freq_arr[$n];
                $frequence_value++;
                $freq_arr[$n]=$frequence_value;
            }
            else
            {
                $freq_arr[$n]=1;
            }
        }

        $max_value_withNums = array();
        $max_value_arr = array();

        //identifying Numbers with frequencies
        
        foreach($freq_arr as $frequence_number=>$no_of_frequence)
        {
            $max_value_withNums[$no_of_frequence] = $frequence_number;
        }

        //Collecting only frequencies
        foreach($max_value_withNums as $no_of_frequence=>$frequence_number)
        {
            $max_value_arr[]=$no_of_frequence;
        }

        $max_value = 0;
        //finding the max value of frequencies
        for($i=0;$i<count($max_value_arr);$i++)
        {
            for($j=1;$j<count($max_value_arr);$j++)
            {
                if($i == $j){continue;}
                 if($max_value_arr[$i]>$max_value_arr[$j])
                {
                    $maxvalue=$max_value_arr[$i];
                }
                else
                {
                    $maxvalue=$max_value_arr[$j];
                }

                if($max_value == 0){$max_value=$maxvalue;}
                else
                {
                    $max_value=($maxvalue > $max_value)?$maxvalue:$max_value;
                }
            }
            
        }

        //finding out the max frequencies as key
        $max_value = ($max_value == 0) ? $max_value_arr[0] : $max_value;
        //returning the max value
        return $max_value_withNums[$max_value];
    }
}

$sol = new Solution();
$nums = [3,2,3];
var_export($sol->majorityElement($nums));
