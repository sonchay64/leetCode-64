<?php

// Available @ https://leetcode.com/problems/isomorphic-strings/submissions/1148643524
/*
Given two strings s and t, determine if they are isomorphic.

Two strings s and t are isomorphic if the characters in s can be replaced to get t.

All occurrences of a character must be replaced with another character while preserving the order of characters. No two characters may map to the same character, but a character may map to itself.

Example 1:

Input: s = "egg", t = "add"
Output: true
Example 2:

Input: s = "foo", t = "bar"
Output: false
Example 3:

Input: s = "paper", t = "title"
Output: true
 

Constraints:

1 <= s.length <= 5 * 104
t.length == s.length
s and t consist of any valid ascii character.


#################### Algorithm #######################

Input: s = "foo", t = "bar"

1. **Initialize dictionaries (`map_s` and `map_t`):**
   - `map_s`: {}
   - `map_t`: {}

2. **Iterate through each character in the strings `s` and `t` simultaneously:**
   - **First Pair: 'f' in `s` corresponds to 'b' in `t`.**
     - Add 'f' => 'b' to `map_s`.
     - Add 'b' => 'f' to `map_t`.
     - Current state:
       - `map_s`: {'f': 'b'}
       - `map_t`: {'b': 'f'}

   - **Second Pair: 'o' in `s` corresponds to 'a' in `t`.**
     - Add 'o' => 'a' to `map_s`.
     - Add 'a' => 'o' to `map_t`.
     - Current state:
       - `map_s`: {'f': 'b', 'o': 'a'}
       - `map_t`: {'b': 'f', 'a': 'o'}

   - **Third Pair: 'o' in `s` corresponds to 'r' in `t`.**
     - Add 'o' => 'r' to `map_s`.
     - Add 'r' => 'o' to `map_t`.
     - Current state:
       - `map_s`: {'f': 'b', 'o': 'r'}
       - `map_t`: {'b': 'f', 'a': 'o', 'r': 'o'}

3. **Check if the lengths of unique values in `map_s` and `map_t` are the same:**
   - Unique values in `map_s`: {'b', 'r'}
   - Unique values in `map_t`: {'f', 'o', 'o'}
   - Length of unique values in `map_s`: 2
   - Length of unique values in `map_t`: 3

4. **Conclusion:**
   - The lengths of the unique values in `map_s` and `map_t` are different.
   - Therefore, the strings "foo" and "bar" are **not** isomorphic.

Concept is - The approach is to iterate through both strings simultaneously, character by character. For each character pair (s[i], t[i]), we check whether it is already present in the maps. If it's not present in both maps, we add it to both maps. If it is present in either map, we check if the mapping is consistent with the existing mappings. If it's not consistent, we return false, indicating that the strings are not isomorphic. If we complete the iteration without finding any inconsistencies, we return true, indicating that the strings are isomorphic.
   #################### Algorithm #######################
*/


Class Solution
{
    function isIsomorphic($s, $t)
    {
        $s_str = str_split($s);
        $t_str = str_split($t);
        $s_map=array();
        $t_map=array();

        if(count($s_str) != count($t_str))
        {
            return false;
        }
        else
        {
            for($i=0;$i<count($s_str);$i++)
            {
                $s_chr=$s_str[$i];
                $t_chr=$t_str[$i];
					
				// echo $charS."_".$charT."\n";
				  
                if(!isset($s_map[$s_chr]) && !isset($t_map[$t_chr]))
                {
    				        $s_map[$s_chr]=$t_chr;
                    $t_map[$t_chr]=$s_chr;
                    
                    // echo "<pre>";
                    // print_r($s_map);
                    // echo "<pre>";
                    // print_r($t_map);
                }
                else{
                    // If present in either map, check for consistency
                    /*echo "<br/><br/>In Else....<br/>";
                    echo $s_chr."_".$t_chr."<br/>";
                    echo $s_map[$s_chr]."==".$t_chr."<br/>";
                    echo $t_map[$t_chr]."==".$s_chr."<br/>";*/
                    if($s_map[$s_chr] !== $t_chr || $t_map[$t_chr] !== $s_chr)
                    {
                        return false; // Inconsistent mapping, not isomorphic
                    }
                    
                
                }
               
            }

            if(count($s_map) != count($t_map))
            {
                return false;
            }
            else 
            {
                return true;
            }
        }//else
    }
}

//$s="egg";
//$t="add";

$s="foo";
$t="bar";

//$s = "bbbaaaba";
//$t = "aaabbbba";

$sol = new Solution();

$result = $sol ->isIsomorphic($s, $t);
echo $result ? "true" : "false";
