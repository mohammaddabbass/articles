<?php

require_once __DIR__ . '/../../connection/connection.php'; 

$query = "INSERT INTO questions (question_text, answer, user_id) VALUES (?, ?, ?)";

if ($stmt = $conn->prepare($query)) {
    $questions = [
        ["What is a Reference Architecture?", "A Reference Architecture is a blueprint that captures accumulated architectural knowledge and serves as a reusable guide for future system developments.", 1],
        ["What is the primary purpose of a Reference Architecture?", "Its purpose is to provide guidance for developing new system architectures by establishing a common baseline.", 1],
        ["How do Reference Architectures capture architectural knowledge?", "They capture both explicit knowledge (documented practices) and implicit knowledge (tacit experience).", 1],
        ["What role do patterns play in Reference Architectures?", "Patterns document recurring design problems and their proven solutions for reuse.", 1],
        ["How does the paper describe the use of abstraction in Reference Architectures?", "Abstraction removes unnecessary details to reveal the essence of a system.", 1],
        ["What is the 'multi' effect mentioned in the paper?", "The 'multi' effect refers to trends such as multi-vendor development and the need for interoperability across multiple domains.", 1],
        ["What driving forces lead to the development of Reference Architectures?", "Key forces include managing complexity, ensuring interoperability, capturing best practices, and aligning with organizational strategy.", 1],
        ["How do Reference Architectures improve interoperability?", "By modeling system functions, interfaces, and standards that ensure compatibility.", 1],
        ["Why is it important to capture implicit knowledge?", "Implicit knowledge held by experienced architects is often undocumented, and capturing it prevents loss of valuable insights.", 1],
        ["What is the difference between system architecture and Reference Architecture?", "System architecture focuses on a specific system, while Reference Architecture captures reusable design principles across multiple systems.", 1],
        ["What challenges are associated with creating Reference Architectures?", "Challenges include finding the right level of abstraction, keeping architectures updated, and balancing generality with applicability.", 1],
        ["What value propositions do Reference Architectures offer?", "They enhance reuse, manage complexity, align teams, mitigate risks, and improve interoperability.", 1],
        ["How should Reference Architectures be managed over time?", "They must be continuously updated to reflect emerging technologies and evolving stakeholder needs.", 1],
        ["What does the paper suggest about the role of Reference Architectures in knowledge management?", "They act as a repository for best practices and lessons learned, improving efficiency.", 1],
        ["What future research directions does the paper recommend?", "Research areas include defining necessary information levels, identifying target audiences, and developing quantitative evaluation metrics.", 1],
        ["How do Reference Architectures relate to enterprise strategy?", "They provide a common framework that aligns technical and business considerations.", 1],
        ["What is the significance of feedback in Reference Architectures?", "Feedback from real-world implementations helps refine and validate the architecture.", 1],
        ["Who are the authors?", "The authors are Robert Cloutier, Gerrit Muller, Dinesh Verma, Roshanak Nilchiani, Eirik Hole, and Mary Bone.", 1],
        ["When was the paper published?", "It was published online on January 22, 2009.", 1],
        ["What is the paper’s focus?", "It focuses on defining and solidifying the concept of Reference Architectures.", 1],
        ["What does a Reference Architecture capture?", "It captures design patterns, business vision, and technical guidelines.", 1],
        ["What industries benefit from Reference Architectures?", "Industries like defense, telecommunications, and healthcare benefit from them.", 1],
        ["What is the main benefit of using a Reference Architecture?", "It provides a reusable blueprint that reduces development time, cost, and risk.", 1],
        ["Why is abstraction important?", "Abstraction distills complex details into essential components for clarity.", 1],
        ["What is implicit knowledge?", "Implicit knowledge is undocumented expertise and experience held by architects.", 1],
        ["What is explicit knowledge?", "Explicit knowledge is documented information that can be shared and reused.", 1],
        ["How does feedback influence Reference Architectures?", "Feedback from implementations helps update and refine the architecture.", 1],
        ["What challenge is associated with large Reference Architectures?", "They can become overly complex, risking the loss of their core essence.", 1],
        ["What future research is recommended?", "Developing quantitative metrics to evaluate the value of Reference Architectures.", 1]
    ];

    foreach ($questions as $q) {
        $stmt->bind_param("ssi", $q[0], $q[1], $q[2]);
        $stmt->execute();
    }

    $stmt->close();
    echo "Seeding completed successfully!";
} else {
    die("Seeding failed: " . $conn->error);
}

$conn->close();
?>
